from pystyle import *

def read_file(filename):
    try:
        with open(filename, 'r',encoding='utf-8') as file:
            return file.read()
    except:
        pass
    
def print_data():
    loc_data = read_file('loc.txt')
    ip_data = read_file('data_ip.txt')
    print(Colors.red + "=" * 40)
    print(Colors.green + "[+] Location Data : ")
    print(Colors.white + ip_data)
    print(Colors.green + "[+] IP Info Data : ")
    print(Colors.white + loc_data)
    print(Colors.red + "=" * 40)
    
if __name__ == '__main__':
    print_data()