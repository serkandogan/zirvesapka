<html>
<body style="margin: 0 auto;">
<div style="background-color:#ffffff;color:#1e1e1e;font-family:&quot;Open Sans&quot;,sans-serif;font-size:14px;line-height:22px;margin:0;padding:0;">
    <div style="color:#444444;padding:10px 0;max-width:644px;min-width:360px;min-height:218px;margin:0 auto;">
        <div style="padding:0 5px;min-width:218px;overflow:hidden;">
            <table style="width:100%;border:1px solid #ddd;margin-bottom:20px;" border="0" cellspacing="0" cellpadding="5">
                <tbody>
                <tr>
                    <td style="    border-bottom: 1px solid #ddd;
    background-color: #f8f8f8;
    font-size: 11px;
    font-weight: bold;
    text-align: center;">
                        <table style="width:100%;" border="0" cellspacing="0">
                            <tbody>
                            {!! $firmaadi !!} Kaydı Sisteme Eklendi
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table style="width:100%;" border="0" cellspacing="0" cellpadding="5">
                            <tbody>
                                <tr>
                                    <td style="width: 74px;">Firma Adı: </td>
                                    <td>{{$firmaadi}}</td>
                                </tr>
                                <tr>
                                    <td style="width: 74px;">Kişi Adı: </td>
                                    <td>{{$kisiadi}}</td>
                                </tr>
                                <tr>
                                    <td style="width: 74px;">Telefon Numarası: </td>
                                    <td>{{$telefon}}</td>
                                </tr>
                                <tr>
                                    <td style="width: 74px;">Mail Adresi: </td>
                                    <td>{{$mail}}</td>
                                </tr>
                                <tr>
                                    <td style="width: 74px;">Ürün Adı:</td>
                                    <td>{{$urun}}</td>
                                </tr>
                                <tr>
                                    <td style="width: 74px;">Adet:</td>
                                    <td>{{$adet}} Adet</td>
                                </tr>
                                <tr>
                                    <td style="width: 74px;">Adresi:</td>
                                    <td>{{$adres}}</td>
                                </tr>
                                <tr>
                                    <td style="width: 74px;">Açıklama:</td>
                                    <td>{{$aciklama}}</td>
                                </tr>
                                <tr>
                                    <td style="width: 74px;">Sisteme kayıt tarihi:</td>
                                    <td>{{$kayittarihi}}</td>
                                </tr>
                            </tbody>
                        </table>

                    </td>
                </tr>
                </tbody>
            </table>
            <p></p>
        </div>
    </div>
</div>
</body>
</html>