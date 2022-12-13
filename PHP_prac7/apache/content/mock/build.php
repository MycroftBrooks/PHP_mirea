<?php
require_once '../../jpgraph/src/jpgraph.php';
require_once '../../jpgraph/src/jpgraph_line.php';
require_once '../../jpgraph/src/jpgraph_bar.php';
require_once '../../jpgraph/src/jpgraph_stock.php';
require_once '../../jpgraph/src/jpgraph_scatter.php';

try {
    set_watermark(plotting_graph());
} catch (Exception $e) {
    echo $e->getMessage();
}

function plot(int $type, $data)
{
    $plot_type = match ($type) {
        0 => new ScatterPlot($data),
        1 => new BarPlot($data),
        2 => new LinePlot($data),
        default => throw new Exception()
    };
    if ($type == 0) {
        $plot_type->mark->SetType(MARK_SQUARE);
        $plot_type->SetImpuls();
    }
    return $plot_type;
}

function set_watermark(GdImage $image): void
{
    $stamp = imagecreate(200, 100);
    imagecolorallocatealpha($stamp, 255, 255, 255, 127);
    imagestring($stamp, 2, 0, 0, 'github.com/Dragonprod',
        imagecolorallocatealpha($stamp, 0, 0, 0, 1));
    $stampWidth = imagesx($stamp);
    $stampHeight = imagesy($stamp);
    imagecopy(
        $image, $stamp,
        imagesx($image) - $stampWidth,
        imagesy($image) - $stampHeight+60,
        0, 0,
        $stampWidth, $stampHeight
    );
    header('Content-type: image/png');
    imagepng($image);
    imagedestroy($image);
}

function plotting_graph(): GdImage
{
    if (array_key_exists('type', $_GET)) $type = $_GET['type'];
    if (array_key_exists('data', $_GET)) $data = $_GET['data'];
    $graph = new Graph(540, 360, 'auto', 10, true);
    $graph->SetScale('textint', 80, 1000);
    $graph->SetBackgroundGradient('silver', 'silver');
    $data = substr_replace($data, '', 0, 1);
    $graph->yaxis->title->Set('People');
    $graph->title->Set('Работники кафе');
    $graph->Add(plot(intval($type), array_map('intval', explode(',', $data))));
    $graph->img->SetImgFormat('png');
    return $graph->Stroke(_IMG_HANDLER);
}