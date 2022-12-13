<?php

class Cafe
{
    var int $year_2018, $year_2019, $year_2020, $year_2021, $year_2022;

    public function __toString(): string
    {
        return sprintf(
            '[%s,%s,%s,%s,%s]',
            $this->year_2018,
            $this->year_2019,
            $this->year_2020,
            $this->year_2021,
            $this->year_2022);
    }

    public static function get_data(): array
    {
        $loader = new Nelmio\Alice\Loader\NativeLoader();

        $objectSet = $loader->loadData([
            Cafe::class => [
                'human{1..51}' => [
                    'year_2018' => '<numberBetween(10, 1000)>',
                    'year_2019' => '<numberBetween(10, 1000)>',
                    'year_2020' => '<numberBetween(10, 1000)>',
                    'year_2021' => '<numberBetween(10, 1000)>',
                    'year_2022' => '<numberBetween(10, 1000)>',
                ],
            ]
        ]);
        return $objectSet->getObjects();
    }
}