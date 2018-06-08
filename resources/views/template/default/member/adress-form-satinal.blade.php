<div class="box-border">
    <ul>
        <label>Adres Tanımları</label>
        <hr />
        <li class="row">
            <div class="col-sm-6">
                <label for="first_name" class="required"> Ad Soyad</label>
                <input type="text" class="input form-control" name="AdresAdSoyad" id="first_name">
            </div>
            <div class="col-xs-12">
                <label for="address" class="required">Adres</label>
                <textarea type="text" class="input form-control" name="AdresAdres" id="address"></textarea>
            </div>
        </li>
        <li class="row">
            <div class="col-sm-6">
                
                {!! Form::label('AdresIlID', 'İl Seçiniz') !!}
                {!! Form::select('AdresIlID', $ilListe, null, ['class'=>'input form-control select2form ilChange']) !!}
                 
            </div>
            <div class="col-sm-6">
                {!! Form::label('AdresIlceID', 'İlçe Seçiniz') !!}
                {!! Form::select('AdresIlceID', array('Lütfen İlçe Seçiniz'), null, ['class'=>'input form-control ilceChange select2form disabled']) !!} 
            </div>
        </li>
        <li class="row">
            <div class="col-sm-6">
                <label for="email_address" class="required">Adres Sabit Telefon Numarası</label>
                <input type="text" class="input form-control" name="AdresTelefon1" id="email_address">
            </div>
             <div class="col-sm-6">
                <label for="email_address" class="required">Adres Cep Telefon Numarası</label>
                <input type="text" class="input form-control" name="AdresCep" id="email_address">
            </div>
        </li>
        <br />
        <br />
        <br />

        <label>Fatura Adres Tanımları</label>
         <hr >
         <br />
        <li class="row">
            <div class="col-sm-6">
                <label for="first_name" class="required">Ad Soyad</label>
                <input type="text" class="input form-control" name="FaturaUnvan" id="first_name">
            </div>
            <div class="col-xs-12">
                <label for="address" class="required">Adres</label>
                <textarea type="text" class="input form-control" name="FaturaAdres" id="address"></textarea>
            </div>
        </li>
        <li class="row">
            <div class="col-sm-6">
                {!! Form::label('FaturaIlID', 'İl Seçiniz') !!}
                {!! Form::select('FaturaIlID', $ilListe, null, ['class'=>'input form-control select2form FaturaIlChange']) !!}
            </div>
            <div class="col-sm-6"> 
                {!! Form::label('FaturaIlceID', 'İlçe Seçiniz') !!}
                {!! Form::select('FaturaIlceID', array('Lütfen İlçe Seçiniz'), null, ['class'=>'input form-control select2form FaturaIlceChange disabled']) !!} 
            </div>
        </li>
        <li class="row">
            <div class="col-sm-6">
                <label for="email_address" class="required">Fatura Sabit Telefon Numarası</label>
                <input type="text" class="input form-control" name="FaturaTelefon1" id="email_address">
            </div>
             <div class="col-sm-6">
                <label for="email_address" class="required">Fatura Cep Telefon Numarası</label>
                <input type="text" class="input form-control" name="FaturaCep" id="email_address">
            </div>
        </li>
        <li class="row">
            <div class="col-sm-6">
                <label for="email_address" class="required">Fatura Vergi Dairesi</label>
                <input type="text" class="input form-control" name="FaturaVergiDaire" id="email_address">
            </div>
             <div class="col-sm-6">
                <label for="email_address" class="required">Fatura Cep Telefon Numarası</label>
                <input type="text" class="input form-control" name="FaturaVergiNumara" id="email_address">
            </div>
        </li>
        <li class="row">
            <div class="col-sm-6">
                <label for="email_address" class="required">Kargo Seç</label>
               <label class="required">İlçe Seçiniz</label>
                    <select class="input form-control" name="KargoID">
                        <option value="KargoID">Alabama</option>
                </select>
            </div>
        </li>
        <br />
        <br />
        <br />
       
    </ul>
</div>