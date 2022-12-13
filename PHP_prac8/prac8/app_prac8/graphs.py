import os
import random

import matplotlib

matplotlib.use("Agg")
import numpy as np
from matplotlib import pyplot as plt


def plot_random_numbers(n):
    fig_urls = []
    for i in range(n):
        humans = [random.randint(10, 1000) for _ in range(5)]
        objects = ("2018", "2019", "2020", "2021", "2022")
        years = np.arange(len(objects))

        plt.bar(years, humans, align="center", alpha=0.5, color = "brown")
        plt.xticks(years, objects)
        plt.ylabel("Работники")
        plt.title("Статистика кофейни")
        try:
            os.remove(f"app_prac8/templates/app_prac8/static/graph{i}.png")
        except FileNotFoundError:
            pass
        finally:
            plt.savefig(f"app_prac8/templates/app_prac8/static/graph{i}.png")
        fig_urls.append(f"app_prac8/templates/app_prac8/static/graph{i}.png")
        plt.close()

    return fig_urls


def get_graph(n):
    return plot_random_numbers(n)


if __name__ == "__main__":
    print(plot_random_numbers())