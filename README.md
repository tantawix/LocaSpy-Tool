# LocaSpy-Tool
LocaSpy is a powerful tool designed to track and log geographic data. It collects precise location details along with information about the user's browser, operating system, and device type.  The tool also retrieves the user's current location. The collected information is then stored in text files for easy review and analysis

## Features

- Logs geographic data such as city, region, and country.
- Captures browser, operating system, and device type information.
- Collects the user's current location when they visit the link.
- Stores all data in text files for easy access and analysis.

## Installation

- Clone the repository:
   ```bash
   git clone https://github.com/your-username/LocaSpy.git
   ```
## How to Run the Tool

To run the tool, follow these steps:

1. **Run the `run_tool.bat` file**:
   - Double-click the `run_tool.bat` file to open the tool.
   
2. **Choose the Server Type**:
   - **Local Server**: If you want to test locally.
   - **Cloudflare Tunnel**: Use this if you want to target a specific victim.
   
3. **Once the Victim Visits the Link**:
   - After the victim visits the generated Cloudflare link, the results will be logged in:
     - **`data_ip.txt`**: This file will contain the IP address, browser information, OS, and device type.
     - **`loc.txt`**: This file will store the geographic location details of the user (city, region, country).
     
4. **View Results in CMD**:
   - To view the results in the command prompt, run the following command:
     ```bash
     python results.py
     ```

### Note:
- **Location Permission**: Make sure the victim has location services enabled on their machine for accurate location tracking.

---

## Contributing

Feel free to modify the tool or suggest improvements! Any contributions or suggestions are welcome, and I’ll be happy to assist you.

For any inquiries or further information, you can reach me via LinkedIn:  
[My LinkedIn](https://www.linkedin.com/in/muhammed-tantawy-484441218/)