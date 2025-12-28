pipeline {
    agent any

    environment {
        DOCKER_IMAGE = "sakshiparadkar/student-management-system:latest"
    }

    stages {
        stage('Checkout') {
            steps {
                git branch: 'main', url: 'https://github.com/SakshiP900/StudentManagementWeb.git'
            }
        }

        stage('Docker Build & Push') {
            steps {
                withCredentials([usernamePassword(credentialsId: 'docker-hub-credentials',
                                                 usernameVariable: 'DOCKER_USER',
                                                 passwordVariable: 'DOCKER_PASS')]) {
                    script {
                        sh 'docker build -t student-management-system:latest .'
                        sh 'echo $DOCKER_PASS | docker login -u $DOCKER_USER --password-stdin'
                        sh 'docker tag student-management-system:latest $DOCKER_IMAGE'
                        sh 'docker push $DOCKER_IMAGE'
                    }
                }
            }
        }

        stage('Deploy to Kubernetes') {
            steps {
                withCredentials([file(credentialsId: 'kubeconfig-credentials', variable: 'KUBECONFIG_FILE')]) {
                    script {
                        sh """
                        export KUBECONFIG='\\\$KUBECONFIG_FILE'
                        kubectl apply -f k8s/db-config.yml
                        kubectl apply -f k8s/db-secret.yml
                        kubectl apply -f k8s/student-management-deployment.yml
                        kubectl apply -f k8s/student-management-service.yml
                        kubectl rollout restart deployment student-management
                        """
                    }
                }
            }
        }
    }
}
