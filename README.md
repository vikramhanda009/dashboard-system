# Dashboard System (Symfony – DDD + CQRS)

## 📌 Overview

This project implements a high-performance **Dashboard system** using:

* Symfony 6/7
* PHP 8.2+
* Domain-Driven Design (DDD)
* CQRS (Command Query Responsibility Segregation)
* Event-Driven Architecture
* Asynchronous Processing
* Caching Layer
* Optimized Read Models

The system handles **100,000+ records efficiently** with optimized memory usage and query performance.

---

## 🧠 Architecture

### 🔹 Layers

```
src/
 ├── Domain/           # Business logic (Entity)
 ├── Application/      # Commands, Queries, Handlers, Events
 ├── Infrastructure/   # DB, Cache, Messenger
 └── UI/               # Controllers (API endpoints)
```

---

### 🔹 CQRS Implementation

**Write Flow (Command)**

```
Controller → Command → CommandHandler → Entity → DB → Event
```

**Read Flow (Query)**

```
Controller → Query → QueryHandler → Cache → DB
```

---

### 🔹 Event-Driven Design

* Event: `DashboardCreatedEvent`
* Triggered after data creation
* Processed via Symfony Messenger (async-ready)

---

### 🔹 Asynchronous Processing

* Implemented using Symfony Messenger
* Configured with `sync://` transport (can be replaced with RabbitMQ/Redis)

---

### 🔹 Caching Layer

* Symfony Cache Component used
* Query results cached per page:

```
dashboard_{page}
```

---

### 🔹 Optimized Read Model

* Uses lightweight SELECT queries (no full entity hydration)
* Pagination applied
* Returns array results for performance

---

### 🔹 Performance Optimization

* Batch insert for 100K records (flush + clear every 500)
* Query execution time logged using `microtime()`

---

## 🧩 Features

* Create Dashboard entries (Command)
* Fetch Dashboard data (Query)
* Handles 100,000+ records efficiently
* Caching for fast reads
* Event dispatching on write
* Performance logging

---

## ⚙️ Setup Instructions

### 1. Install dependencies

```
composer install
```

---

### 2. Configure Database

Update `.env`:

```
DATABASE_URL="postgresql://<user>@127.0.0.1:5432/dashboard_app"
```

---

### 3. Run Migrations

```
php bin/console doctrine:migrations:migrate
```

---

### 4. Load Data (100K records)

```
php -d memory_limit=512M bin/console doctrine:fixtures:load
```

---

### 5. Run Application

```
php -S 127.0.0.1:8000 -t public
```

---

## 🌐 API Endpoints

### Get Dashboard Data

```
GET /dashboard
```

---

### Create Dashboard Entry

```
POST /dashboard/create
```

Body:

```
title=Test
views=100
```

---

## 🧪 Run Unit Tests

```
php bin/phpunit
```

---

## 📊 Performance Considerations

* Batch processing avoids memory overflow
* Query caching reduces DB load
* Optimized read model ensures fast response
* Logging helps track performance bottlenecks

---

## 🧠 Key Decisions

* Used CQRS to separate read/write concerns
* Used caching for scalability
* Used event-driven approach for extensibility
* Avoided heavy ORM hydration for performance

---

## 🚀 Future Improvements

* Replace sync transport with real queue (RabbitMQ)
* Add Redis caching
* Add advanced filtering/search
* Add monitoring (Prometheus / logs)

---

## ✅ Conclusion

This implementation demonstrates:

* Clean architecture (DDD + CQRS)
* Scalability (100K+ records)
* Performance optimization
* Production-ready patterns

---

## 👤 Author

Vikram Handa
