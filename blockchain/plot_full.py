import json
import matplotlib.pyplot as plt

with open("benchmark_full.json", "r") as f:
    data = json.load(f)

algos = {}

for item in data:
    algo = item["algo"]
    if algo not in algos:
        algos[algo] = {
            "x": [],
            "time": [],
            "tps": [],
            "hash": []
        }

    algos[algo]["x"].append(item["transactions"])
    algos[algo]["time"].append(item["time"])
    algos[algo]["tps"].append(item["tps"])
    algos[algo]["hash"].append(item["hash_speed"])


# =========================
# 1. Thời gian xử lý
# =========================
plt.figure()
for algo in algos:
    plt.plot(algos[algo]["x"], algos[algo]["time"], marker='o', label=algo)

plt.xlabel("Số giao dịch")
plt.ylabel("Thời gian (giây)")
plt.title("Thời gian xử lý theo số giao dịch")
plt.legend()
plt.grid()
plt.savefig("time_chart.png")


# =========================
# 2. TPS
# =========================
plt.figure()
for algo in algos:
    plt.plot(algos[algo]["x"], algos[algo]["tps"], marker='o', label=algo)

plt.xlabel("Số giao dịch")
plt.ylabel("TPS")
plt.title("Transactions Per Second")
plt.legend()
plt.grid()
plt.savefig("tps_chart.png")


# =========================
# 3. Hash speed
# =========================
plt.figure()
for algo in algos:
    plt.plot(algos[algo]["x"], algos[algo]["hash"], marker='o', label=algo)

plt.xlabel("Số giao dịch")
plt.ylabel("Hash / giây")
plt.title("Tốc độ tạo hash")
plt.legend()
plt.grid()
plt.savefig("hash_chart.png")


# =========================
# 4. So sánh tại 1000 giao dịch
# =========================
labels = []
times = []

for item in data:
    if item["transactions"] == 1000:
        labels.append(item["algo"])
        times.append(item["time"])

plt.figure()
plt.bar(labels, times)
plt.xlabel("Thuật toán")
plt.ylabel("Thời gian (giây)")
plt.title("So sánh thuật toán tại 1000 giao dịch")
plt.savefig("compare_chart.png")

print("Đã xuất 4 biểu đồ!")