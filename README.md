## インスタグラムもどき

これはオンラインスキルアップの課題です。
http://skillup-chanjeed.herokuapp.com/home

### - 画面仕様書の中で実装できたもの
      - Login画面
      - Home画面
             - いいね機能
             - Back/Nextボタン
             - Delete機能
             - いいねしたユーザ一覧画面に遷移するボタン
      - Upload画面
      - Profile画面
      - いいねしたユーザ一覧画面
      - ログインしている・していない、の状態によって動作が異なる
      - 共通ヘッダー
             - ログインしている・していない、の状態によって表示と動作が異なる

### - 画面仕様書の中で実装できなかったもの
      - ないと思います


### - 工夫したところ
      - 画像が表示できる
      - いいねしたユーザーの数をいいねボタンの隣に表示するようにした
      - いいねしたユーザ一覧画面に画像も表示する
      - http://skillup-chanjeed.herokuapp.com/home をログイン時にアクセスすると自分のProfile画面に遷移する
      　　　　- 未ログイン時にアクセスすると、ログイン画面に遷移するようにした
      - いいねボタンは、未ログイン時に押下できない（非アクティブ）ではなく、ログイン画面に遷移するようにした
      - レイアウトをできるだけ奇麗にした

### - 難しかったところ
      - herokuに公開する
      - 変数の受け渡し方(GET/POST)
      - ログイン機能
      - レイアウトを奇麗にする

### - 追加した機能について説明（あれば）
      - Home画面にFirst（最初のページ）/Last（最後のページ）ボタンを追加した
      - Profile画面から画像をクリックするとその画像の投稿が表示するビューに遷移する。Back to profileボタンでProfileの画面に戻ることができる

### - その他（あれば）
　    - Herokuでは500 server errorのエラーが出ています
