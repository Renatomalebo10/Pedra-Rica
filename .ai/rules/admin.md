---
paths:
  - 'app/Http/Controllers/Admin/*.php'
---

# Admin

## Campos numéricos NOT NULL -> 0 ao salvar
O banco Aiven usa MySQL com STRICT_TRANS_TABLES: colunas inteiras NOT NULL (goals, assists, matches_played etc.) lançam 500 se receberem null. Ao salvar, normalize os campos numéricos para 0 (não null) quando vazios, e apenas campos nullable (ex: number) podem ser null. Use player normalizePlayerStats como referência.

## Nao duplique prefixo no delete de fotos
Os models de foto (Player, Coach, Trophy, News, Gallery, Game) têm accessors que ADICIONAM o prefixo da subpasta na leitura (ex: getPhotoAttribute retorna 'players/arquivo'). Nos métodos destroy(), nunca prefixe de novo (ex: 'players/'.$model->photo) - isso vira 'players/players/...' e o delete falha silenciosamente. Use Storage::disk('public')->delete($model->photo) direto.

## Alinhe a variavel do form com a do controller
Ao criar/editar um recurso admin, a variavel passada pelo controller a view do form DEVE corresponder a variavel que o form espera em isset($var). Houve 3 casos quebrados (Gallery $item vs $image, News $article vs $news, SocialLinks $link vs $socialLink) onde editar abria o form como 'novo'. Sempre cheque o form antes de editar o controller, e adicione teste do edit renderizando o registro.
