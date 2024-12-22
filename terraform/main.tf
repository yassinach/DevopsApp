provider "docker" {}

resource "docker_image" "mysql" {
  name = "mysql:latest"
}

resource "docker_container" "mysql" {
  image = docker_image.mysql.latest
  name  = "terraform-mysql"
  ports {
    internal = 3306
    external = 3307
  }
  env = [
    "MYSQL_ROOT_PASSWORD=root",
    "MYSQL_DATABASE=akaunting",
    "MYSQL_USER=akaunting_user",
    "MYSQL_PASSWORD=akaunting_password"
  ]
}

resource "docker_image" "akaunting" {
  name = "akaunting/akaunting:latest"
}

resource "docker_container" "akaunting" {
  image = docker_image.akaunting.latest
  name  = "terraform-akaunting"
  ports {
    internal = 80
    external = 8000
  }
  env = [
    "DB_HOST=terraform-mysql",
    "DB_PORT=3306",
    "DB_DATABASE=akaunting",
    "DB_USERNAME=akaunting_user",
    "DB_PASSWORD=akaunting_password"
  ]
}
