pipeline {
    agent any

    environment {
        DOCKER_IMAGE = "sakshiparadkar/student-management-system:latest"
        EC2_HOST = "ec2-user@43.205.198.224"       // Your EC2 IP
        SSH_CREDENTIALS = "ec2-ssh-credentials"    // Jenkins SSH key credential ID for EC2
    }

    stages {
        stage('Checkout') {
            steps {
                // Checkout the main branch from GitHub
                git branch: 'main', url: 'https://github.com/sakshiparadkar/StudentManagementWeb.git'
            }
        }

        stage('Docker Build & Push') {
            steps {
                withCredentials([usernamePassword(credentialsId: 'docker-hub-credentials',
                                                 usernameVariable: 'DOCKER_USER',
                                                 passwordVariable: 'DOCKER_PASS')]) {
                    script {
                        // Build Docker image
                        sh "docker build -t student-management-system:latest ."
                        
                        // Login to Docker Hub
                        sh "echo $DOCKER_PASS | docker login -u $DOCKER_USER --password-stdin"
                        
                        // Tag and push to Docker Hub
                        sh "docker tag student-management-system:latest $DOCKER_IMAGE"
                        sh "docker push $DOCKER_IMAGE"
                    }
                }
            }
        }

        stage('Deploy to EC2') {
            steps {
                sshagent (credentials: ["${SSH_CREDENTIALS}"]) {
                    script {
                        // Deploy on EC2: stop old container, remove it, run new container
                        sh """
                        ssh -o StrictHostKeyChecking=no $EC2_HOST '
                            docker pull $DOCKER_IMAGE &&
                            docker stop student-management || true &&
                            docker rm student-management || true &&
                            docker run -d --name student-management -p 80:80 $DOCKER_IMAGE
                        '
                        """
                    }
                }
            }
        }
    }
}
