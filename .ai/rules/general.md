---
paths:
  - render.yaml
---

# General

## render.yaml: use autoDeployTrigger, não autoDeploy
No render.yaml use autoDeployTrigger (commit|checksPass|off), NÃO autoDeploy (deprecado). Sempre defina repo:, branch: main, dockerContext: ., numInstances e healthCheckPath. Depois de editar, push para main; mudanças no render.yaml só são aplicadas se o serviço foi criado via Blueprint.
