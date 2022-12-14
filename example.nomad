job "example" {
  datacenters = ["dc1"]
  type = "service"
  group "cache" {
    count = 1
    network {
      port "db" {
        to = 6379
      }
    }
    service {
      name     = "redis-cache"
      tags     = ["global", "cache"]
      port     = "db"
      provider = "nomad"
    }
    task "redis" {
      driver = "docker"
      config {
        image = "redis:7"
        ports = ["db"]
        auth_soft_fail = true
      }
      resources {
        cpu    = 500 # 500 MHz
        memory = 256 # 256MB
      }
    }
  }
}
