# 🚀 I3cubes-CorporateSite CI/CD Pipeline 🌐

This repository houses the `I3cubes-CorporateSite` application and features a robust **CI/CD (Continuous Integration/Continuous Delivery) pipeline** designed to automate the build, test, and deployment processes. Our goal is to ensure that every code change is seamlessly integrated, thoroughly validated, and efficiently deployed to our AWS EC2 instance.

---

## 🚦 CI/CD Pipeline Overview

Our pipeline, orchestrated by **Jenkins**, follows a structured flow to ensure smooth and reliable software delivery:

1.  **Code Commit** 💻: Developers push their code changes to the `main` branch of this GitHub repository.
2.  **Webhook Trigger** 🎣: A pre-configured webhook in GitHub notifies Jenkins about the new commit, initiating the pipeline.
3.  **Code Checkout** 🛒: Jenkins pulls the very latest version of the code from the repository.
4.  **Build Docker Image** 🏗️: The application's Docker image is built, encapsulating all necessary dependencies.
5.  **Test** 🧪: Automated tests are executed to validate the application's functionality and catch any regressions.
6.  **Docker Push** ⬆️: The newly built Docker image is pushed to Docker Hub, making it available for deployment.
7.  **Deploy to EC2** 🚀: The Docker image is then deployed to our AWS EC2 instance, bringing the latest version of the application live.

---

## 🛠️ Step-by-Step Implementation Guide

This section provides a detailed walkthrough of setting up your AWS EC2 instance, Jenkins, Docker, and configuring the Jenkins pipeline.

### 1. Launch & Configure AWS EC2 Instance ☁️

The AWS EC2 instance serves as the backbone, hosting both Jenkins and your deployed application.

* **Launch an EC2 Instance**:
    * Sign in to the [AWS Management Console](https://aws.amazon.com/console/).
    * Navigate to the **EC2 dashboard** and click "**Launch Instance**".
    * Choose an **Ubuntu AMI** (e.g., `Ubuntu Server 22.04 LTS`).
    * Select an appropriate instance type (e.g., `t2.medium` or larger, depending on your build needs, with at least **8GB storage**).
    * **Crucially, create a new key pair (.pem file)** and save it securely. This file is your key to SSH access.

* **Configure Security Group**:
    * During instance launch, set up a new security group or modify an existing one.
    * **Inbound Rules**:
        * **SSH (Port 22)**: Allow access from your IP address or a trusted range for secure shell access.
        * **Jenkins (Port 8080)**: Allow TCP traffic on port 8080 from `0.0.0.0/0` (for public access; consider restricting to specific IPs for better security).
        * **Application Port(s) (Port 80)**: Since your application runs on port 80 inside the Docker container and maps to port 80 on the host, ensure port 80 is open for HTTP access.

    ---

    ![EC2 Security Group Configuration](https://github.com/dopramo/I3C-CorporateSite1/blob/main/Screenshot%20from%202025-06-17%2022-12-10.png)

### 2. Install Jenkins & Docker on EC2 🐧🐳

Once your EC2 instance is live, connect to it via SSH and install the necessary software.

* **Connect to your EC2 Instance**:
    * Open your terminal.
    * Set appropriate permissions for your key pair:
        ```bash
        chmod 400 your-key-pair.pem
        ```
    * Connect to your instance:
        ```bash
        ssh -i /path/to/your-key-pair.pem ubuntu@your-ec2-public-ip
        ```

* **Install AWS CLI**:
    ```bash
    sudo apt install unzip -y
    curl "[https://awscli.amazonaws.com/awscli-exe-linux-x86_64.zip](https://awscli.amazonaws.com/awscli-exe-linux-x86_64.zip)" -o "awscliv2.zip"
    unzip awscliv2.zip
    sudo ./aws/install
    ```

* **Update Packages**:
    ```bash
    sudo apt update -y
    sudo apt upgrade -y
    ```

* **Install Java**: Jenkins requires Java to run.
    ```bash
    sudo apt install openjdk-17-jre -y
    java -version
    ```

* **Install Jenkins on Ubuntu**:
    ```bash
    #!/bin/bash
    sudo apt update -y
    wget -O - [https://packages.adoptium.net/artifactory/api/gpg/key/public](https://packages.adoptium.net/artifactory/api/gpg/key/public) | sudo tee /etc/apt/keyrings/adoptium.asc
    echo "deb [signed-by=/etc/apt/keyrings/adoptium.asc] [https://packages.adoptium.net/artifactory/deb](https://packages.adoptium.net/artifactory/deb) $(awk -F= '/^VERSION_CODENAME/{print$2}' /etc/os-release) main" | sudo tee /etc/apt/sources.list.d/adoptium.list
    sudo apt update -y
    sudo apt install temurin-17-jdk -y
    /usr/bin/java --version
    curl -fsSL [https://pkg.jenkins.io/debian-stable/jenkins.io-2023.key](https://pkg.jenkins.io/debian-stable/jenkins.io-2023.key) | sudo tee /usr/share/keyrings/jenkins-keyring.asc > /dev/null
    echo deb [signed-by=/usr/share/keyrings/jenkins-keyring.asc] [https://pkg.jenkins.io/debian-stable](https://pkg.jenkins.io/debian-stable) binary/ | sudo tee /etc/apt/sources.list.d/jenkins.list > /dev/null
    sudo apt-get update -y
    sudo apt-get install jenkins -y
    sudo systemctl start jenkins
    sudo systemctl status jenkins
    ```

* **Install Docker on Ubuntu**:
    ```bash
    sudo apt-get update
    sudo apt-get install ca-certificates curl
    sudo install -m 0755 -d /etc/apt/keyrings
    sudo curl -fsSL [https://download.docker.com/linux/ubuntu/gpg](https://download.docker.com/linux/ubuntu/gpg) -o /etc/apt/keyrings/docker.asc
    sudo chmod a+r /etc/apt/keyrings/docker.asc
    echo "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.asc] [https://download.docker.com/linux/ubuntu](https://download.docker.com/linux/ubuntu) $(. /etc/os-release && echo "$VERSION_CODENAME") stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
    sudo apt-get update
    sudo apt-get install docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin -y
    sudo usermod -aG docker ubuntu
    sudo chmod 777 /var/run/docker.sock
    newgrp docker
    sudo systemctl status docker
    ```

### 3. Configure Jenkins ⚙️

Once Jenkins is installed, access its web UI for configuration.

* **Access Jenkins UI**: Open your web browser and navigate to `http://your-ec2-public-ip:8080`.
* **Unlock Jenkins**:
    * Retrieve the initial admin password:
        ```bash
        sudo cat /var/lib/jenkins/secrets/initialAdminPassword
        ```
    * Paste the password into the Jenkins unlock screen.
* **Install Plugins**:
    * Choose "**Install suggested plugins**."
    * After installation, create an admin user or continue as admin.
    * Go to **Manage Jenkins** > **Manage Plugins**.
    * In the **Available** tab, search for and install:
        * `Docker Pipeline`
        * `Docker`
        * `Git` (usually installed by default, but confirm)
    * Restart Jenkins if prompted.
* **Configure Global Tools (JDK, Git)**:
    * Go to **Manage Jenkins** > **Tools**.
    * **JDK**: Add a JDK installation (e.g., `Install automatically` and select a version like OpenJDK 17).
    * **Git**: Ensure Git is configured.
* **Configure Credentials** 🔑:
    * Go to **Manage Jenkins** > **Manage Credentials** > **(global)** > **Add Credentials**.
    * **SSH Credentials for EC2 Deployment**:
        * **Kind**: Select "**SSH Username with private key**."
        * **Scope**: "Global."
        * **ID**: Enter a descriptive ID (e.g., `jenkins-deploy`). This ID will be used in your `Jenkinsfile`.
        * **Username**: Enter the SSH username for your EC2 instance (e.g., `ubuntu`).
        * **Private Key**: Choose "**Enter directly**," click "**Add**," and paste the *entire content* of your `.pem` key file (e.g., `I3.pem`), including `----BEGIN RSA PRIVATE KEY-----` and `----END RSA PRIVATE KEY-----`. If your key has a passphrase, enter it in the "Passphrase" field.
    * **Docker Hub/Registry Credentials**:
        * **Kind**: Select "**Username with password**."
        * **Scope**: "Global."
        * **ID**: Enter `dockerhub-credentials`.
        * **Username**: Your Docker Hub username.
        * **Password**: Your Docker Hub password.
    * **GitHub Personal Access Token (PAT) for Repository Authentication**:
        * **Kind**: Select "**Secret text**."
        * **Scope**: "Global."
        * **ID**: Enter `github-pat-for-repo-auth`.
        * **Secret**: Paste your GitHub Personal Access Token. This token should have `repo` scope to allow Jenkins to checkout your private repository.

### 4. Define Jenkins Pipeline (Jenkinsfile) 📝

The core of your CI/CD is the `Jenkinsfile`, located at the root of this repository. It defines the pipeline's stages using Groovy syntax.

### 5. Create Jenkins Pipeline Job ➕
To integrate your Jenkinsfile with Jenkins:

* In Jenkins, click "**New Item**".
* Enter a name (e.g., `I3C-CorporateSite-CI-CD`).
* Select "**Pipeline**" and click "**OK**".
* In the configuration page:
    * Under **Pipeline** > **Definition**, select "**Pipeline script from SCM**".
    * **SCM**: Choose "**Git**".
    * **Repository URL**: Paste the URL of your Git repository: `https://github.com/dopramo/I3C-CorporateSite1.git`
    * **Credentials**: Select the Git credentials (`github-pat-for-repo-auth`) you configured.
    * **Branches to build**: `/main` (or your preferred branch).
    * **Script Path**: Keep it as `Jenkinsfile` (assuming your `Jenkinsfile` is at the root).
* **Build Triggers**:
    * For automatic builds, enable "**GitHub hook trigger for GITScm polling**" (if using GitHub) or configure a webhook in your Git repository provider to trigger Jenkins on pushes.
    * Alternatively, you can use "Poll SCM" to periodically check for changes (less efficient).
* Click "**Save**".
### 6. Dockerfile 🐳
The Dockerfile in this repository defines how your application is packaged into a Docker image.

---

## 📞 Get in Touch

Have questions or need assistance with this CI/CD pipeline? Feel free to open an issue in this repository!

---

© 2025 I3cubes. All Rights Reserved. | Built with ❤️ and Automation 🤖
