# Debugging Ruby Applications with mirrord

<div align="center">
  <a href="https://mirrord.dev">
    <img src="images/mirrord.svg" width="150" alt="mirrord Logo"/>
  </a>
  <a href="https://www.ruby-lang.org/en/">
    <img src="images/php.svg" width="150" alt="Ruby Logo"/>
  </a>
</div>

## Overview

This is a sample web application built with PHP and Redis to demonstrate debugging Kubernetes applications using mirrord. The application tracks visitor counts using Redis and displays them on a web interface.

## Prerequisites

- PHP 8.2 or higher
- Docker and Docker Compose
- Kubernetes cluster
- mirrord CLI installed

## Quick Start

1. Clone the repository:

```bash
git clone https://github.com/waveywaves/mirrord-php-debug-example
cd mirrord-php-debug-example
```

2. Deploy to Kubernetes:

```bash
kubectl create -f ./kube
```

3. Debug with mirrord:

```bash
mirrord exec -t deployment/php-app php -S localhost:8080
```

The application will be available at http://localhost:8080

## Architecture

The application consists of:
- PHP web server
- Redis instance for storing visit counts

## License

This project is licensed under the MIT License - see the LICENSE file for details.