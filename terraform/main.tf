terraform {
  required_providers {
    docker = {
      source = "kreuzwerker/docker"
      version = "~> 2.0"
    }
  }
  required_version = ">= 1.1.0"
}

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