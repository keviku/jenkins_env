node {
  checkout scm
  withEnv([  
    'WORDPRESS_URL=host.docker.internal:8000',
    'BUILD_NAME=test',
    'API_TOKEN=remote',
    'JENKINS_URL=54.158.244.103:7070'
    
  ]) {
    withCredentials([string(credentialsID: 'key', variable: 'KEY')]) {      
    stage('Deploy') {  
              sh "docker-compose -p test up -d"
          
        }
}
