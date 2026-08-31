---
paths:
  - 'app/Http/Controllers/Admin/*.php'
---

# Admin

## Campos numéricos NOT NULL -> 0 ao salvar
O banco Aiven usa MySQL com STRICT_TRANS_TABLES: colunas inteiras NOT NULL (goals, assists, matches_played etc.) lançam 500 se receberem null. Ao salvar, normalize os campos numéricos para 0 (não null) quando vazios, e apenas campos nullable (ex: number) podem ser null. Use player normalizePlayerStats como referência.
