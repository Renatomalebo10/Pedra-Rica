---
paths:
  - Dockerfile
---

# Dockerfile

## Seed do admin obrigatório no CMD do Dockerfile
O CMD do Dockerfile (usado no deploy Railway/Render) deve rodar migrate --force e seed idempotente (só se o admin@pedrarica.com não existir), com @php artisan tinker --execute para checar existencia. Sem o seed não há usuário admin de produção.
