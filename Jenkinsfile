node {
  checkout scm
  withEnv([  
    'WORDPRESS_URL=host.docker.internal:8000',
    'BUILD_NAME=test',
    'API_TOKEN=remote',
    'JENKINS_URL=54.158.244.103:7070', 
    'KEY=11babc36ee32d3c483c6a17c5c46989652'
  ]) { 
    stage('Deploy') {  
              sh "docker-compose -p test up -d"          
        } 
    }
  }
