---
paths:
  - config/filesystems.php
---

# Config

## Fotos em Cloudflare R2 (S3-compatible)
Em produção (Render free) o disco local é efêmero, então as fotos são armazenadas no Cloudflare R2 via driver S3. Para ativar, definiu-se FILESYSTEM_DISK=s3 e as variáveis AWS_* (R2 Access Key) no ambiente. O disco 'public' já mapeia para s3 quando FILESYSTEM_DISK=s3. As views servem fotos por /storage/{path} que redireciona via Storage::disk('public')->url() quando s3.
