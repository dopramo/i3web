pipeline {
    agent any // Specifies that the pipeline can run on any available Jenkins agent

    environment {
        // Replace with your Docker Hub username and desired image name
        DOCKER_IMAGE_NAME = "dopramo/i3c-corporate-site"
        // Replace 'your-git-credentials-id' with the ID you set for your Git credentials in Jenkins
        DOCKER_CREDENTIALS_ID = 'dockerhub-credentials'
        // Update this line with the ID of your new Secret Text credential
        GIT_CREDENTIALS_ID = 'github-pat-for-repo-auth' // Make sure this matches the ID you set in Jenkins
        // Replace with the public IP of your EC2 instance where the app will be deployed
        EC2_PUBLIC_IP = '54.242.178.103'
        // Replace 'your-ssh-credentials-id' with the ID you set for your SSH key credentials in Jenkins
        SSH_CREDENTIALS_ID = 'your-ssh-credentials-id'
    }

    stages {
        stage('Checkout Code') {
            steps {
                git branch: 'main', credentialsId: env.GIT_CREDENTIALS_ID, url: 'https://github.com/dopramo/I3C-CorporateSite1.git' // UPDATE THIS: Your actual repo URL
            }
        }

        /*stage('Code Quality Analysis') {
            steps {
                script {
                    echo "Running PHP Lint (syntax check)..."
                    // Exclude the entire PHPMailer-master directory from linting
                    sh 'find . -name "*.php" ! -path "./PHPMailer-master/*" -print0 | xargs -0 -n1 php -l'
                    echo "PHP Lint completed."

                    echo "Running PHP CodeSniffer (coding standards check)..."
                    // Exclude the PHPMailer-master directory from PHPCS
                    sh 'phpcs --standard=PSR12 --ignore=vendor/,PHPMailer-master/ . --colors'
                    echo "PHP CodeSniffer completed."
                }
            }
        }*/

        stage('Build Docker Image') {
            steps {
                script {
                    // Build the Docker image using the Dockerfile in the current directory (project root)
                    dockerImage = docker.build("${env.DOCKER_IMAGE_NAME}:${env.BUILD_NUMBER}", ".")
                }
            }
        }

        stage('Test') {
            steps {
                script {
                    echo "Running tests..."
                    // This is where you'd execute your application's tests (e.g., PHPUnit).
                    // Example if tests are in your Docker image or require Composer:
                    // dockerImage.inside {
                    //    sh 'composer install --no-dev' // If your tests need composer dependencies
                    //    sh 'php vendor/bin/phpunit' // Adjust path to your phpunit executable
                    // }
                    // If you have a separate test runner command:
                    // sh 'docker run --rm your-test-runner-image phpunit /app/tests'
                    echo "Tests completed (placeholder for actual tests)."
                }
            }
        }

        stage('Push Docker Image') {
            steps {
                script {
                    docker.withRegistry('https://index.docker.io/v1/', env.DOCKER_CREDENTIALS_ID) {
                        dockerImage.push() // Pushes with build number tag
                        dockerImage.push('latest') // Also push with 'latest' tag for easier deployment reference
                    }
                }
            }
        }

        stage('Deploy to EC2') {
            steps {
                script {
                    // Use SSH agent to connect to the target EC2 instance and run deployment commands
                    sshagent(['jenkins-deploy']) {
                        sh "ssh -o StrictHostKeyChecking=no ubuntu@${env.EC2_PUBLIC_IP} 'docker pull ${env.DOCKER_IMAGE_NAME}:${env.BUILD_NUMBER}'"
                        sh "ssh -o StrictHostKeyChecking=no ubuntu@${env.EC2_PUBLIC_IP} 'docker stop i3c-corporate-site || true'" // Stop old container if running
                        sh "ssh -o StrictHostKeyChecking=no ubuntu@${env.EC2_PUBLIC_IP} 'docker rm i3c-corporate-site || true'" // Remove old container
                        // Run the new container, mapping port 80 of the host to port 80 of the container
                        sh "ssh -o StrictHostKeyChecking=no ubuntu@${env.EC2_PUBLIC_IP} 'docker run -d --name i3c-corporate-site -p 80:80 ${env.DOCKER_IMAGE_NAME}:${env.BUILD_NUMBER}'"
                    }
                }
            }
        }
    }

    post {
        always {
            echo 'Pipeline finished.'
        }
        success {
            echo 'Pipeline succeeded!'
            // Add notification steps here (e.g., email, Slack)
        }
        failure {
            echo 'Pipeline failed!'
            // Add failure notification and rollback/alert steps here
        }
    }
}
