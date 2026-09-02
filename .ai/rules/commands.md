---
paths:
  - 'app/Console/Commands/**'
---

# Commands

## app:initialize no preDeployCommand da Render
Use php artisan app:initialize no preDeployCommand da Render (render.yaml) em vez de tinker inline no YAML (fragil). O comando roda migrate --force, seed idempotente (so se admin@pedrarica.com nao existe) e optimize. Nunca rode config:cache e depois php artisan test: o cache de config ignora o override SQLite do phpunit.xml (erro getaddrinfo).
