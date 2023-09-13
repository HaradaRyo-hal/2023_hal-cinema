<?php
// TODO
// スケジュールIDの取得
// ユーザのテーブルIDを取得



  $theater = $_GET['theater'];

  // 外部ファイルからコンテンツを読み込む
  if ($theater == 'シアター１') {
      $seatContent = file_get_contents('./seat/A_theater_seat.html');
  } elseif ($theater == 'シアター２') {
      $seatContent = file_get_contents('./seat/B_theater_seat.html');
  } elseif ($theater == 'シアター３') {
      $seatContent = file_get_contents('./seat/C_theater_seat.html');
  } else {
      $seatContent = 'その他の劇場の座席情報';
  }

  // スケジュールID
  setcookie("schedule", -1);
  // ユーザID -> 本来ならcookie入力済み
  setcookie("userid", -1);


?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../common.css" />
    <link rel="stylesheet" href="./kounyuu_zaseki.css" />
    <script src="../common.js"></script>

    <title>1.座席選択</title>
  </head>
  <body>

    <header>
      <img src="../images/logo.png" class="logo" />
      <div class="stepbar-row">
        <ol class="stepbar">
            <li class="done"><span></span><br />座席選択</li>
            <li><span></span><br />券種選択</li>
            <li><span></span><br />情報入力</li>
            <li><span></span><br />確認画面</li>
            <li><span></span><br />購入完了</li>
        </ol>
    </div>
    </header>

    <main>

      <div class="main_view">
        <h2>座席選択</h2>
        <p>
          ご希望の座席を選択して「次へ」ボタンを押してください。<br />
          選択できる座席数は最大6席までとなります。<br />
          ※車椅子席をご希望の方は、お手数ですが通常のお席をご購入の上、対象の劇場にご連絡ください。
        </p>
      </div>

      <div class="seat-column">

        <div class="seat_module"><!-- モジュールで画面を切り替えるようにする -->
          <?php echo $seatContent; ?>
        </div>
            
        <div class="view_box">
          <div class="sekiyoyaku">
            <div class="box"></div>
            <div class="text">空席</div>
            <div class="box selected"></div>
            <div class="text">選択済み</div>
            <div class="box reserved"></div>
            <div class="text">予約済み</div>
          </div>
        </div>
      </div>

      <div class="select_box">
        <p>現在、選択されているチケットは下記のとおりです。</p>
        <div class="box-item">
          <div class="title">劇場 / スクリーン</div>
          <div class="text">グランドシネマサンシャイン / シアター２　仮</div>
        </div>
        <div class="box-item">
          <div class="title">鑑賞日時</div>
          <div class="text">2023年07月04日(火) 10:25 - 12:55仮</div>
        </div>
        <div class="box-item">
          <div class="title">作品名</div>
          <div class="text">マリオ仮</div>
        </div>
      </div>

      <div class="riyoukiyaku">
        <p>
          <b>利用規約</b><br />
          利用規約に同意した上で「次へ」ボタンを押してください。<br />
        </p>
      </div>

      <div class="scrollbar">
        <p>
          【オンライン利用規約】

          前文
          佐々木興業株式会社(以下、「当社」とします)は、「オンライン先売りチケットサービス」（以下「本サービス」とします)をご利用いただく際に、次の利用規約(以下「本規約」とします)を設けております。本規約をご承諾の上、本サービスをご利用ください。
          第1条　本サービスの内容と利用条件
          ・ 本サービスは、当社が運営する映画館で上映を行う映画の鑑賞チケットを当社が運営しているサイト(以下、「当サイト」とします)にて事前予約販売するものです。
          ・ 本サービスをご利用頂くには本規約への同意が必要となります。
          ・ お客様が本規約のすべての条項に同意されない場合は本サービスをご利用頂けません。
          また、お客様が本規約に違反した場合にはご利用をお断りすることがあります。
          ・ お客様自身の責任においてコンピューター・携帯電話の操作およびインターネット利用ができ、本サービスを利用するために必要なインターネット環境の適切な設定、文字(日本語表示)やメール等の諸設定がなされている方を対象にしています。また上記条件を満たしていても、誤操作やネット環境の事情によって本サービスが正常に動作しない場合、それらがもたらす諸影響について当社は一切責任を負いません。
          ・ インターネット利用の一般的なマナー、モラルを遵守して頂きます。当社が不適切と判断する行為を行うお客様には本サービスのご利用をお断りすることがあります。
          ・ 未成年者が本サービスを利用する場合、親権者または後見人の同意の上ご利用ください。未成年者が本サービスを利用された場合は、本サービスの全ての事項について親権者または後見人の同意があったものとみなします。

          第2条　本サービス・規約の変更／中断／中止について
          ・ 当社は事前の通告無しに本サービス、本規約の変更をすることがあります。本サービスをご利用の際は必ずサービス内容・本規約をご確認ください。内容変更後は変更後の内容のみを有効とさせて頂きます。
          ・ 当社は以下の理由によりお客様に通告無しに本サービスの全部又は一部を中断、中止できるものとします。
          1.本サービスに係るシステムの定期的または突発的な理由による保守・点検を行う場合
          2.天災、事変、その他の非常事態の発生により本サービスの提供が困難になった場合
          3.当社以外の第三者の妨害によって本サービスの提供が困難になった場合
          4.その他、当社が本サービスの運営上必要と判断した場合
          ・ 当社は理由の如何を問わず、本サービスの提供の中断または中止によって生じたお客様の損害につき、一切責任を負わないものとします。

          第3条　禁止行為
          1.他のお客様、第三者または当社に不利益もしくは損害を与える行為、および与えるおそれのある行為
          2.他のお客様、第三者または当社を誹謗中傷する行為
          3.犯罪的行為、もしくは犯罪的行為に結び付く行為、またはそのおそれのある行為
          4.法令に違反する、または違反するおそれのある行為
          5.公序良俗に反する行為、もしくはそのおそれのある行為、または公序良俗に反する情報を他のお客様または第三者に提供する行為
          6.性風俗、宗教、政治に関する行為
          7.権利者の承諾を得ないで、いかなる方法においても、本サービスを通じて提供される情報・著作物について著作権法で定める個人の私的利用の範囲を超えて使用すること
          8.本サービスを通じて、もしくは本サービスに関連して、営利を目的とする行為、またはその準備を目的とした行為
          9.コンピューターウイルスなどの有害なプログラムを、本サービスを通じて、もしくは本サービスに関連して使用する、提供する行為
          10.当社から購入した電子チケットを、営利を目的として第三者に転売、または転売のために第三者に提供する行為
          11.その他、当社が不適切と判断する行為

          第4条　チケット販売について
          ・ 本サービスご利用にあたって「氏名」「連絡先」「メールアドレス」「クレジットカード番号」「電話番号」などの個人情報を入力していただきます。個人情報が不正確・虚偽がある場合はお申込みを無効とさせて頂きます。
          ・ 本サービスは、当サイトに掲載されている上映作品、上映時間のうち販売画面で選択可能なもののチケットのみご購入頂けます。一部上映作品、上映時間については取扱いがない場合があります。
          ・ 本サービスはシステムメンテナンスによるサービス提供の中断及び第2条で定める場合をのぞき、24時間営業を行っております。メンテナンスを行う際は事前に当サイトにて告知しますが、第2条で定める通りやむをえない場合は事前の通告無しにサービスを中断します。
          ・ 本サービスは当社規定の料金体系に基づくことを前提とします。尚、対象券種は当社が決定するものとし、お客様への事前の通告なしに変更できるものとします。
          ※各種証明書のご提示が必要な券種は、ご鑑賞当日、入場口にて確認させて頂きます。詳しくは第7条でご確認ください。
          ・ ご予約の受付はご鑑賞日2日前0：00から上映開始時間までです。1回の購入申込みで購入出来る枚数に制限が付きます。制限枚数は、その都度変更されます。制限枚数以上購入の場合は複数の購入操作が必要となります。複数の購入申込みを行った場合、座席は購入操作ごとで離れたお席になります。
          ※リワード会員の受付はご鑑賞日3日前21：00から早期購入可能です。
          ※販売開始日時は、一部作品・上映により異なる場合がございます。
          ・ 映画倫理規定管理委員会の定めたレイティング(鑑賞年齢制限)の定められた作品では該当のお客様のご利用をお断りすることがあります。制限年齢に達しないお客様が誤って購入したチケットの返金・交換は一切受付けておりません。
          ・ 東京都青少年健全育成条例の定めにより、18歳未満及び高校生の方は終映が23:00を過ぎる上映回のチケットをご購入頂けません。また保護者同伴でもご入場頂けません。
          ・ 本サービスにおける売買契約の成立は、入力頂いた内容に基づきクレジット決済与信手続が終了した時点とします。発券の際には本サービス発行の「予約番号」、お客様入力の「電話番号」が必要となります。
          ・ 購入完了画面表示後はお客様の都合による上映作品の日時の変更、購入の取消、チケットの払い戻しはできないものとします。また、交通渋滞による遅延などその他いかなる場合でも、上映作品の日時変更、購入の取消、チケットの払い戻しは受付けません。なお、チケットはクーリングオフの対象外となっております。
          ・ 当社からご購入の予約番号の記載された確認のメールを送信します。当サイトの指定項目の記入漏れ、メールアドレスの誤入力、文字化けなどにより確認のメールが送信できない場合、確認メールの不達、遅達について当社は一切の責任を負わないものとします。
          ・ 上映劇場はやむをえず変更になる場合があります。上映劇場の変更やその他の理由により予約座席が変更となる場合があります。
          ・ 上映開始後のご入場は他のお客様のご迷惑になりますので、チケット記載の上映時間から40分以上経ちましたら、ご入場はお断りさせていただきます。また、ご来場者特典のみのお渡しも致しかねます。
          ・ 不可抗力による上映中止の場合は、所定の期間内に限り所定の方法にて払い戻しを行います。払い戻しの対象はチケット代金のみとなります。お客様都合による払い戻しはできません。

          第5条　決済方法
          ・ 本サービスの支払い方法はクレジットカード決済になります。国内発行かつ当社指定のクレジットカード(VISA,Master Card,JCB,American express,Diners Club)をお持ちのお客様のみご利用頂けます。
          ・ チケット購入手続きの際の虚偽入力、誤入力もしくは入力漏れ、またはクレジットカード会社の規約違反等によりクレジットカード決済ができない場合は、チケットの購入は無効とさせて頂きます。クレジットカードのお取扱いができない場合には、クレジット会社に直接お問い合わせください。
          ・ クレジットカード利用によるトラブルについて当社は一切の責任を負いません。
          ・ その他、本サービスにおけるクレジットカード決済に関する事項は、クレジット会社における利用規約に準じます。

          第6条　発券方法
          ・ チケットの発券方法は以下2通りからお選び頂けます。
          上映当日に劇場備え付けの「自動発券機」に「予約番号」とお客様が設定された「電話番号」を入力するとチケットを発券頂けます。
          またはチケット情報確認画面へアクセス頂き、「チケットを購入した劇場」「予約番号」「電話番号」を入力してログインし、 ご鑑賞時間の24時間前から入場用QRコードチケットを取得して頂けます。
          いずれかのチケットをご持参頂きご入場ください。
          予約番号、電話番号を失念された場合は劇場スタッフにお申し付けください。入力された個人情報が確認できない場合、発券できないことがあります。
          ・ チケットは如何なる場合(紛失・盗難・破損など)でも再発行致しません。

          第7条　身分証明書の提示
          ・本サービスで購入された「学生」、「シニア」、「ハンディキャップ」、「ペア50割」、「誕生日月割」のチケットについて当該チケットの引渡しを受けたお客様は、ご入場時、身分証明書の提示が必要です。提示がない場合は一般料金との差額を頂きます。
          ・ 各種割引チケットで必要な証明書は以下の通りです。
          「学生」：学校長発行の学生証または生徒手帳
          ※「学生」・・・大学生、専門学校生、高等専門学校生、高等学校生を指します。
          「シニア」、「ペア50割」、「誕生日月割」：生年月日又は年齢について記載のある公的機関発行の身分証明書(運転免許証など)
          ※「誕生日月割」・・・一部劇場のみ実施
          「ハンディキャップ」：障がい者手帳、療育手帳、身体障がい者手帳、精神障がい者保健福祉手帳、もしくは障がい者手帳アプリ「ミライロＩＤ」

          第8条　個人情報の取扱い
          ・ 当社は、別途掲載する「プライバシーポリシー」と本条項に基づきお客様の個人情報を取扱うものとし、お客様は「プライバシーポリシー」と本条項を確認し同意の上、本サービスをご利用頂くものとします。
          ・ 本サービスにて入力頂く個人情報は、お客様に本サービスを円滑に提供するため収集するものです。
          ・ 本サービスは、個人情報の入力及びクレジット決済時にあたり、情報を第三者に傍受されないよう暗号化する方式(SSL)を採用して個人情報の保護に努めておりますが、その方式にも限界があり100％安全性を保証できるわけではありません。データへの不正アクセスほか、いかなる方法でトラブルが生じた場合でも一切責任を負わないものとします。
          ※SSLとはSecure Socket Layerの略で、インターネット上でやり取りされているデータ(個人名、住所、電話番号などの個人情報や企業の機密情報など)を暗号・複合化し、第三者からデータを覗かれないようにする通信技術のことです。SSLでは、暗号化は送信側で通信データをパケットに分割する前に行われ、複合化は受信パケットを組み合わせた後に行われます。このため通信中のデータはすべて解読困難な形になっています。ただし、暗号化された情報を複合することは、例えそれが解読に膨大な時間がかかるような極めて難しい計算を要したとしても理論上は可能であり、データへの不正アクセスが100%起こらないとは言い切れません。

          第9条　著作権
          ・ お客様は権利者の同意を得ずして本サービスを通して提供される情報などについて著作権法で定める私的利用の範囲を超えて使用することは出来ません。
          ・ 前項の規定に関わらず、権利者とお客様の間で問題が生じた場合は、お客様は自己の責任と費用において問題解決に当たっていただきます。

          第10条　業務の委託
          ・ 当社は本サービスの提供に必要な業務の全部又は一部を、当社が適切と判断するところに従い、第三者に委託して行わせることができるものとします。

          第11条　免責
          ・ 当社は本サービス内容の正確性確保に鋭意努めますが、本サービス内容およびお客様が本サービスを通じて得る情報等の完全性、正確性、確実性、有用性等については如何なる保証も行いません。
          ・ 当サイトの利用・閲覧はお客様の責任で行うものとします。当サイトへのアクセス、画像などのデータをダウンロードすることにより、お客様のコンピューター機器等が損害を被った場合、又はウイルスに感染された場合であっても当社は一切の責任を負いません。
          ・ 上映中止によりチケット料金の払い戻しを行う場合は、原則として払い戻し金額はチケット券面額とします。券面金額以外の費用(クレジットカードの手数料、旅費交通費、通信費等)を当社は一切負担いたしません。
          ・ 当社は本サービスからリンクされている各サイトに含まれている情報、サービス等については一切関知しておらず、一切の責任を負わないものとします。

          第12条　準拠法及び管轄裁判所
          ・ 本規約の解釈、適用に関わる準拠法は日本法とします。
          ・ 本サービスに関連して、お客様が故意または過失に関わらず、他のお客様、当社、第三者に損害を与えた場合、お客様は自己の費用と責任で損害を賠償するものとします。
          ・ 本サービスに関連してお客様と当社との間で紛争が生じた場合には、双方誠意を持って協議するものとします。
          ・ 前項の協議によっても紛争を解決できない場合は、東京地方裁判所または東京簡易裁判所を専属的合意管轄裁判所とします。

          第13条　その他
          ・ お客様は、本規約に定めのない事項について、別途当社の定めるところに従うものとします。
        </p>
      </div>

      <form action="../2.券種/step2.php" onsubmit="return checkForm(event)">
        <div class="doui">
          <input type="checkbox" id="myCheckbox" />
          <label for="myCheckbox">利用規約に同意する</label>
        </div>
        <div class="next">
          <input type="submit" value="送信" />
        </div>
      </form>
      
      <div>
        <a href="#" class="moda">◀戻る</a>
      </div>

    </main>

    <footer>
      <div class="container">
        <img src="../images/logo2.png" alt="画像の説明" />
        <ul>
          <li><a href="#">会社概要</a></li>
          <li><a href="#">特定商取引法に基づく表記</a></li>
          <li><a href="#">利用規約</a></li>
          <li><a href="#">プライバシーポリシー</a></li>
          <li><a href="#">サイトマップ</a></li>
          <p>
            Copy right © 2023 HAL CINEMA All rights reserved.
          </p>
        </ul>
      </div>
    </footer>

  </body>
</html>
