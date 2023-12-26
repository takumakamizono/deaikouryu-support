<?php 
$page_id = 106;
$pdf01 = get_field('pdf01',$page_id);
$pdf02 = get_field('pdf02',$page_id);
$pdf03 = get_field('pdf03',$page_id);
$pdf04 = get_field('pdf04',$page_id);
$pdf05 = get_field('pdf05',$page_id);
$pdf06 = get_field('pdf06',$page_id);
$word01 = get_field('word01',$page_id);
$word02 = get_field('word02',$page_id);
$word03 = get_field('word03',$page_id);
$registration_pdf = get_field('registration-list-pdf',$page_id);
       
?>
<section class="recruitment">             
<div class="recruitment__desc">
  <div class="recruitment__desc-top">
    <p>市の取組に趣旨に賛同し、<br class="sp02">従業員の出会いを応援する取組を行う企業・団体を広く募集します。</p>
    <h3>登録団体を随時募集します。</h3>
     <p>下記表示の「サポート団体に登録」ボタンより、ぜひ登録ください。</p>
  </div>
  <div class="recruitment__desc-second">
    <h4>登録団体について</h4>
     <p>自社の従業員の出会いを応援する「従業員サポート団体」と、イベントの企画・実施などにより従業員サポート団体の活動を支援いただく「出会いサポート団体」の２つがあります。形態等に応じて、登録する団体をお選びください。両方にご登録いただくこともできます。</p>
  </div>

  <div class="recruitment__desc-heart">
<div class="recruitment__desc-heart-left">
  <div class="recruitment__desc-heart-img">
    <img src="<?= get_template_directory_uri(); ?>/images/group-staff.png?v2" alt="">
  </div>
  <div class="recruitment__desc-heart-txts">
  <h5 class="recruitment__desc-heart-tit">自社の従業員の出会い・交流を支援</h5>
  <ul>
    <li>従業員への出会いイベントの情報提供</li>
    <li>従業員サポート団体間での出会いイベントの実施・協力など</li>
  </ul>
  </div>
</div>
<div class="recruitment__desc-heart-right">
 <div class="recruitment__desc-heart-img">
    <img src="<?= get_template_directory_uri(); ?>/images/group-support.png?v2" alt="">
  </div>
  <div class="recruitment__desc-heart-txts">
  <h5 class="recruitment__desc-heart-tit">イベントの企画・実施などにより従業員サポート団体の活動を支援</h5>
  <ul>
    <li>従業員サポート団体の独身従業員を対象とした、出会いや交流を応援する取組み（出会いイベントの開催、会場提供、飲食提供など。それぞれの団体の得意な領域でサポートしていたただきます）</li>
    <li>市が実施する結婚支援の取組の周知協力など</li>
  </ul>
  </div>
</div>
</div>
<div class="recruitment__desc-entry">
    <h4><span>&#9312;</span> 登録資格</h4>
     <p>市内に事務所又は事業所等がある企業・団体で、本事業の趣旨に賛同し、自社の独身従業員の出会いの応援や、出会いの場の提供が可能であること。（結婚相談、お見合い、出会い及び結婚の斡旋等を業とする企業等は除きます）</p>
  </div>
  <div id="entry" class="recruitment__desc-entry">
    <h4><span>&#9313;</span>登録方法</h4>
     <p>実施要領をご覧いただき下の応募フォーム（「サポート団体に登録」ボタン）よりご登録ください。（所定の様式による登録も受け付けております。お問い合わせフォームからご連絡ください。）</p>
     <div class="recruitment__pdf">
                  <div class="recruitment__pdf-btn">
                    <a href="<?= $pdf01['url'] ?>"target="_blank" rel="noopener">事業実施要領（PDF）</a>
                  </div>
                  <div class="recruitment__pdf-btn">
                    <a href="<?= $pdf02['url'] ?>" target="_blank" rel="noopener">事業案内リーフレット（PDF）</a>
                  </div>
                  <div class="recruitment__pdf-btn">
                    <a href="<?= $pdf06['url'] ?>" target="_blank" rel="noopener">「補足資料：出会イベントの開催について」（PDF）</a>
                  </div>
                </div>
                <div class="recruitment__pdf">
                  <div class="recruitment__pdf-btn">
                  <span>出会いイベント実施計画書（従業員サポート団体⽤）</span>     
                   <span>
                    <a href="<?= $pdf03['url'] ?>" target="_blank" rel="noopener">PDF</a>
                    <a href="<?= $word01['url'] ?>" target="_blank" rel="noopener">Word</a>
                    </span>


                  </div>
                  <div class="recruitment__pdf-btn">
                    <span>出会いイベント実施計画書（出会いサポート団体⽤）</span>
                  
                    <span>
                    <a href="<?= $pdf04['url'] ?>" target="_blank" rel="noopener">PDF</a>
                    <a href="<?= $word02['url'] ?>" target="_blank" rel="noopener">Word</a>
                    </span>

                  </div>
                  <div class="recruitment__pdf-btn">
                    <span>出会いイベント実施報告書（共通）</span>
                   
                    <span>
                    <a href="<?= $pdf05['url'] ?>" target="_blank" rel="noopener">PDF</a>
                    <a href="<?= $word03['url'] ?>" target="_blank" rel="noopener">Word</a>
                    </span>

                  </div>
                  </div>
  </div>

  
    <div class="registration-list-btn">
      <a class="btn" href="<?= $registration_pdf['url'] ?>" target="_blank" rel="noopener">登録企業・団体一覧</a>
    </div>
  

                </div>
              </section>