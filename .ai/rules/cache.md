---
paths:
  - 'bootstrap/cache/**'
---

# Cache

## config:cache quebra testes (SQLite override)
Nunca deixe bootstrap/cache/config.php cacheado no repo ou no dev local: depois de `php artisan config:cache`, o Laravel carrega o config cacheado e IGNORA o override DB_CONNECTION=sqlite do phpunit.xml, fazendo os testes tentarem conectar no MySQL/Aiven (erro getaddrinfo). Rode `php artisan config:clear` antes de `php artisan test`. bootstrap/cache é gitignored.
