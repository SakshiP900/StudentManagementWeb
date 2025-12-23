pipeline {
    agent any

    environment {
        DOCKER_IMAGE = "student-management-system:latest"
        DOCKER_REGISTRY = "sakshiparadkar/student-management-system"
        EC2_HOST = "ec2-user@43.205.198.224"
        SSH_CREDENTIALS = "ec2-ssh-credentials"  // Jenkins SSH key credential ID for EC2
    }

    stages {
        stage('Checkout') {
            steps {
                git branch: 'main', url: 'https://github.com/SakshiP900/StudentManagementWeb.git'
            }
        }

        stage('Build Docker Image') {
            steps {
                script {
                    sh "docker build -t $DOCKER_IMAGE ."
                }
            }
        }

        stage('Push to Docker Hub') {
            steps {
                withCredentials([usernamePassword(credentialsId: 'docker-hub-credentials', 
                                                 usernameVariable: 'DOCKER_USER', 
                                                 passwordVariable: 'DOCKER_PASS')]) {
                    script {
                        sh "echo $DOCKER_PASS | docker login -u $DOCKER_USER --password-stdin"
                        sh "docker tag $DOCKER_IMAGE $DOCKER_REGISTRY"
                        sh "docker push $DOCKER_REGISTRY"
                    }
                }
            }
        }

        stage('Deploy to EC2') {
            steps {
                sshagent (credentials: ["${SSH_CREDENTIALS}"]) {
                    script {
                        sh """
                        ssh -o StrictHostKeyChecking=no $EC2_HOST '
                            docker pull $DOCKER_REGISTRY &&
                            docker stop student-management || true &&
                            docker rm student-management || true &&
                            docker run -d --name student-management -p 80:80 $DOCKER_REGISTRY
                        '
                        """
                    }
                }
            }
        }
    }
}
