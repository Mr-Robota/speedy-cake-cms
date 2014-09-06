<script type="text/javascript">
	
$(document).ready(function() {
	
	$('#slogan').focus();
	
	$('#slogan').keypress(function(e) {
		
		if (e.which == 13) $("#btnSave").click();
		
	});
	
	$("#btnSave").click(function() {
	
		$('#loader').show();
		$('#SettingIndexForm').submit();
		
	});
	
	
});

</script>

<div class="row-fluid">

<?php echo $this->element('menu'); ?>

<?php echo $this->Form->create('Setting',array('action' => 'index')); ?>

<div class="span9">

	<div class="well">
    
		<h1><?php echo __('Generals'); ?></h1>
        
        <div class="row-fluid">
			<div class="span12">
				<p><strong>Slogan</strong></p>
				<?php 
					
				  echo $this->Form->input('slogan',array(
					  'id'=>'slogan',
					  'type'=>'text',
					  'class'=>'input-block-level',
					  'value'=>$slogan,
					  'label'=>false,
					  'div'=>false
				  )); 
				  
				?>
			</div>
		</div>
        
        <div class="row-fluid">
			<div class="span12">
				<p><strong>Timezone</strong></p>
				<select id="timezone" name="data[Setting][timezone]">
                    <optgroup label="Africa">
                    <option value="Africa/Abidjan" <?php if ($timezone=="Africa/Abidjan") echo "selected"; ?>>Abidjan</option>
                    <option value="Africa/Accra" <?php if ($timezone=="Africa/Accra") echo "selected"; ?>>Accra</option>
                    <option value="Africa/Addis_Ababa" <?php if ($timezone=="Africa/Addis_Ababa") echo "selected"; ?>>Addis Abeba</option>
                    <option value="Africa/Algiers" <?php if ($timezone=="Africa/Algiers") echo "selected"; ?>>Algeri</option>
                    <option value="Africa/Asmara" <?php if ($timezone=="Africa/Asmara") echo "selected"; ?>>Asmara</option>
                    <option value="Africa/Bamako" <?php if ($timezone=="Africa/Bamako") echo "selected"; ?>>Bamako</option>
                    <option value="Africa/Bangui" <?php if ($timezone=="Africa/Bangui") echo "selected"; ?>>Bangui</option>
                    <option value="Africa/Banjul" <?php if ($timezone=="Africa/Banjul") echo "selected"; ?>>Banjul</option>
                    <option value="Africa/Bissau" <?php if ($timezone=="Africa/Bissau") echo "selected"; ?>>Bissau</option>
                    <option value="Africa/Blantyre" <?php if ($timezone=="Africa/Blantyre") echo "selected"; ?>>Blantyre</option>
                    <option value="Africa/Brazzaville" <?php if ($timezone=="Africa/Brazzaville") echo "selected"; ?>>Brazzaville</option>
                    <option value="Africa/Bujumbura" <?php if ($timezone=="Africa/Bujumbura") echo "selected"; ?>>Bujumbura</option>
                    <option value="Africa/Cairo" <?php if ($timezone=="Africa/Cairo") echo "selected"; ?>>Cairo</option>
                    <option value="Africa/Casablanca" <?php if ($timezone=="Africa/Casablanca") echo "selected"; ?>>Casablanca</option>
                    <option value="Africa/Ceuta" <?php if ($timezone=="Africa/Ceuta") echo "selected"; ?>>Ceuta</option>
                    <option value="Africa/Conakry" <?php if ($timezone=="Africa/Conakry") echo "selected"; ?>>Conakry</option>
                    <option value="Africa/Dakar" <?php if ($timezone=="Africa/Dakar") echo "selected"; ?>>Dakar</option>
                    <option value="Africa/Dar_es_Salaam" <?php if ($timezone=="Africa/Dar_es_Salaam") echo "selected"; ?>>Dar es Salaam</option>
                    <option value="Africa/Douala" <?php if ($timezone=="Africa/Douala") echo "selected"; ?>>Douala</option>
                    <option value="Africa/El_Aaiun" <?php if ($timezone=="Africa/El_Aaiun") echo "selected"; ?>>El Aaiun</option>
                    <option value="Africa/Freetown" <?php if ($timezone=="Africa/Freetown") echo "selected"; ?>>Freetown</option>
                    <option value="Africa/Gaborone" <?php if ($timezone=="Africa/Gaborone") echo "selected"; ?>>Gaborone</option>
                    <option value="Africa/Djibouti" <?php if ($timezone=="Africa/Djibouti") echo "selected"; ?>>Gibuti</option>
                    <option value="Africa/Harare" <?php if ($timezone=="Africa/Harare") echo "selected"; ?>>Harare</option>
                    <option value="Africa/Johannesburg" <?php if ($timezone=="Africa/Johannesburg") echo "selected"; ?>>Johannesburg</option>
                    <option value="Africa/Juba" <?php if ($timezone=="Africa/Juba") echo "selected"; ?>>Juba</option>
                    <option value="Africa/Kampala" <?php if ($timezone=="Africa/Kampala") echo "selected"; ?>>Kampala</option>
                    <option value="Africa/Khartoum" <?php if ($timezone=="Africa/Khartoum") echo "selected"; ?>>Khartoum</option>
                    <option value="Africa/Kigali" <?php if ($timezone=="Africa/Kigali") echo "selected"; ?>>Kigali</option>
                    <option value="Africa/Kinshasa" <?php if ($timezone=="Africa/Kinshasa") echo "selected"; ?>>Kinshasa</option>
                    <option value="Africa/Lagos" <?php if ($timezone=="Africa/Lagos") echo "selected"; ?>>Lagos</option>
                    <option value="Africa/Libreville" <?php if ($timezone=="Africa/Libreville") echo "selected"; ?>>Libreville</option>
                    <option value="Africa/Lome" <?php if ($timezone=="Africa/Lome") echo "selected"; ?>>Lome</option>
                    <option value="Africa/Luanda" <?php if ($timezone=="Africa/Luanda") echo "selected"; ?>>Luanda</option>
                    <option value="Africa/Lubumbashi" <?php if ($timezone=="Africa/Lubumbashi") echo "selected"; ?>>Lubumbashi</option>
                    <option value="Africa/Lusaka" <?php if ($timezone=="Africa/Lusaka") echo "selected"; ?>>Lusaka</option>
                    <option value="Africa/Malabo" <?php if ($timezone=="Africa/Malabo") echo "selected"; ?>>Malabo</option>
                    <option value="Africa/Maputo" <?php if ($timezone=="Africa/Maputo") echo "selected"; ?>>Maputo</option>
                    <option value="Africa/Maseru" <?php if ($timezone=="Africa/Maseru") echo "selected"; ?>>Maseru</option>
                    <option value="Africa/Mbabane" <?php if ($timezone=="Africa/Mbabane") echo "selected"; ?>>Mbabane</option>
                    <option value="Africa/Mogadishu" <?php if ($timezone=="Africa/Mogadishu") echo "selected"; ?>>Mogadiscio</option>
                    <option value="Africa/Monrovia" <?php if ($timezone=="Africa/Monrovia") echo "selected"; ?>>Monrovia</option>
                    <option value="Africa/Nairobi" <?php if ($timezone=="Africa/Nairobi") echo "selected"; ?>>Nairobi</option>
                    <option value="Africa/Ndjamena" <?php if ($timezone=="Africa/Ndjamena") echo "selected"; ?>>Ndjamena</option>
                    <option value="Africa/Niamey" <?php if ($timezone=="Africa/Niamey") echo "selected"; ?>>Niamey</option>
                    <option value="Africa/Nouakchott" <?php if ($timezone=="Africa/Nouakchott") echo "selected"; ?>>Nouakchott</option>
                    <option value="Africa/Ouagadougou" <?php if ($timezone=="Africa/Ouagadougou") echo "selected"; ?>>Ouagadougou</option>
                    <option value="Africa/Porto-Novo" <?php if ($timezone=="Africa/Porto-Novo") echo "selected"; ?>>Porto-Novo</option>
                    <option value="Africa/Sao_Tome" <?php if ($timezone=="Africa/Sao_Tome") echo "selected"; ?>>Sao Tome</option>
                    <option value="Africa/Tripoli" <?php if ($timezone=="Africa/Tripoli") echo "selected"; ?>>Tripoli</option>
                    <option value="Africa/Tunis" <?php if ($timezone=="Africa/Tunis") echo "selected"; ?>>Tunisi</option>
                    <option value="Africa/Windhoek" <?php if ($timezone=="Africa/Windhoek") echo "selected"; ?>>Windhoek</option>
                    </optgroup>
                    <optgroup label="America">
                    <option value="America/Adak" <?php if ($timezone=="America/Adak") echo "selected"; ?>>Adak</option>
                    <option value="America/Anchorage" <?php if ($timezone=="America/Anchorage") echo "selected"; ?>>Anchorage</option>
                    <option value="America/Anguilla" <?php if ($timezone=="America/Anguilla") echo "selected"; ?>>Anguilla</option>
                    <option value="America/Antigua" <?php if ($timezone=="America/Antigua") echo "selected"; ?>>Antigua</option>
                    <option value="America/Araguaina" <?php if ($timezone=="America/Araguaina") echo "selected"; ?>>Araguaina</option>
                    <option value="America/Argentina/Buenos_Aires" <?php if ($timezone=="America/Argentina/Buenos_Aires") echo "selected"; ?>>Argentina - Buenos Aires</option>
                    <option value="America/Argentina/Catamarca" <?php if ($timezone=="America/Argentina/Catamarca") echo "selected"; ?>>Argentina - Catamarca</option>
                    <option value="America/Argentina/Cordoba" <?php if ($timezone=="America/Argentina/Cordoba") echo "selected"; ?>>Argentina - Cordoba</option>
                    <option value="America/Argentina/Jujuy" <?php if ($timezone=="America/Argentina/Jujuy") echo "selected"; ?>>Argentina - Jujuy</option>
                    <option value="America/Argentina/La_Rioja" <?php if ($timezone=="America/Argentina/La_Rioja") echo "selected"; ?>>Argentina - La Rioja</option>
                    <option value="America/Argentina/Mendoza" <?php if ($timezone=="America/Argentina/Mendoza") echo "selected"; ?>>Argentina - Mendoza</option>
                    <option value="America/Argentina/Rio_Gallegos" <?php if ($timezone=="America/Argentina/Rio_Gallegos") echo "selected"; ?>>Argentina - Rio Gallegos</option>
                    <option value="America/Argentina/Salta" <?php if ($timezone=="America/Argentina/Salta") echo "selected"; ?>>Argentina - Salta</option>
                    <option value="America/Argentina/San_Juan" <?php if ($timezone=="America/Argentina/San_Juan") echo "selected"; ?>>Argentina - San Juan</option>
                    <option value="America/Argentina/San_Luis" <?php if ($timezone=="America/Argentina/San_Luis") echo "selected"; ?>>Argentina - San Luis</option>
                    <option value="America/Argentina/Tucuman" <?php if ($timezone=="America/Argentina/Tucuman") echo "selected"; ?>>Argentina - Tucuman</option>
                    <option value="America/Argentina/Ushuaia" <?php if ($timezone=="America/Argentina/Ushuaia") echo "selected"; ?>>Argentina - Ushuaia</option>
                    <option value="America/Aruba" <?php if ($timezone=="America/Aruba") echo "selected"; ?>>Aruba</option>
                    <option value="America/Asuncion" <?php if ($timezone=="America/Asuncion") echo "selected"; ?>>Asuncion</option>
                    <option value="America/Atikokan" <?php if ($timezone=="America/Atikokan") echo "selected"; ?>>Atikokan</option>
                    <option value="America/Bahia" <?php if ($timezone=="America/Bahia") echo "selected"; ?>>Bahia</option>
                    <option value="America/Bahia_Banderas" <?php if ($timezone=="America/Bahia_Banderas") echo "selected"; ?>>Bahia Banderas</option>
                    <option value="America/Barbados" <?php if ($timezone=="America/Barbados") echo "selected"; ?>>Barbados</option>
                    <option value="America/Belem" <?php if ($timezone=="America/Belem") echo "selected"; ?>>Belem</option>
                    <option value="America/Belize" <?php if ($timezone=="America/Belize") echo "selected"; ?>>Belize</option>
                    <option value="America/Blanc-Sablon" <?php if ($timezone=="America/Blanc-Sablon") echo "selected"; ?>>Blanc-Sablon</option>
                    <option value="America/Boa_Vista" <?php if ($timezone=="America/Boa_Vista") echo "selected"; ?>>Boa Vista</option>
                    <option value="America/Bogota" <?php if ($timezone=="America/Bogota") echo "selected"; ?>>Bogotà</option>
                    <option value="America/Boise" <?php if ($timezone=="America/Boise") echo "selected"; ?>>Boise</option>
                    <option value="America/Cayenne" <?php if ($timezone=="America/Cayenne") echo "selected"; ?>>Caienna</option>
                    <option value="America/Cambridge_Bay" <?php if ($timezone=="America/Cambridge_Bay") echo "selected"; ?>>Cambridge Bay</option>
                    <option value="America/Campo_Grande" <?php if ($timezone=="America/Campo_Grande") echo "selected"; ?>>Campo Grande</option>
                    <option value="America/Cancun" <?php if ($timezone=="America/Cancun") echo "selected"; ?>>Cancun</option>
                    <option value="America/Caracas" <?php if ($timezone=="America/Caracas") echo "selected"; ?>>Caracas</option>
                    <option value="America/Cayman" <?php if ($timezone=="America/Cayman") echo "selected"; ?>>Cayman</option>
                    <option value="America/Chicago" <?php if ($timezone=="America/Chicago") echo "selected"; ?>>Chicago</option>
                    <option value="America/Chihuahua" <?php if ($timezone=="America/Chihuahua") echo "selected"; ?>>Chihuahua</option>
                    <option value="America/Mexico_City" <?php if ($timezone=="America/Mexico_City") echo "selected"; ?>>Città del Messico</option>
                    <option value="America/Costa_Rica" <?php if ($timezone=="America/Costa_Rica") echo "selected"; ?>>Costarica</option>
                    <option value="America/Creston" <?php if ($timezone=="America/Creston") echo "selected"; ?>>Creston</option>
                    <option value="America/Cuiaba" <?php if ($timezone=="America/Cuiaba") echo "selected"; ?>>Cuiaba</option>
                    <option value="America/Curacao" <?php if ($timezone=="America/Curacao") echo "selected"; ?>>Curacao</option>
                    <option value="America/Danmarkshavn" <?php if ($timezone=="America/Danmarkshavn") echo "selected"; ?>>Danmarkshavn</option>
                    <option value="America/Dawson" <?php if ($timezone=="America/Dawson") echo "selected"; ?>>Dawson</option>
                    <option value="America/Dawson_Creek" <?php if ($timezone=="America/Dawson_Creek") echo "selected"; ?>>Dawson Creek</option>
                    <option value="America/Denver" <?php if ($timezone=="America/Denver") echo "selected"; ?>>Denver</option>
                    <option value="America/Detroit" <?php if ($timezone=="America/Detroit") echo "selected"; ?>>Detroit</option>
                    <option value="America/Dominica" <?php if ($timezone=="America/Dominica") echo "selected"; ?>>Dominica</option>
                    <option value="America/Edmonton" <?php if ($timezone=="America/Edmonton") echo "selected"; ?>>Edmonton</option>
                    <option value="America/Eirunepe" <?php if ($timezone=="America/Eirunepe") echo "selected"; ?>>Eirunepe</option>
                    <option value="America/El_Salvador" <?php if ($timezone=="America/El_Salvador") echo "selected"; ?>>El Salvador</option>
                    <option value="America/Fortaleza" <?php if ($timezone=="America/Fortaleza") echo "selected"; ?>>Fortaleza</option>
                    <option value="America/Jamaica" <?php if ($timezone=="America/Jamaica") echo "selected"; ?>>Giamaica</option>
                    <option value="America/Glace_Bay" <?php if ($timezone=="America/Glace_Bay") echo "selected"; ?>>Glace Bay</option>
                    <option value="America/Godthab" <?php if ($timezone=="America/Godthab") echo "selected"; ?>>Godthab</option>
                    <option value="America/Goose_Bay" <?php if ($timezone=="America/Goose_Bay") echo "selected"; ?>>Goose Bay</option>
                    <option value="America/Grand_Turk" <?php if ($timezone=="America/Grand_Turk") echo "selected"; ?>>Grand Turk</option>
                    <option value="America/Grenada" <?php if ($timezone=="America/Grenada") echo "selected"; ?>>Grenada</option>
                    <option value="America/Guadeloupe" <?php if ($timezone=="America/Guadeloupe") echo "selected"; ?>>Guadalupa</option>
                    <option value="America/Guatemala" <?php if ($timezone=="America/Guatemala") echo "selected"; ?>>Guatemala</option>
                    <option value="America/Guayaquil" <?php if ($timezone=="America/Guayaquil") echo "selected"; ?>>Guayaquil</option>
                    <option value="America/Guyana" <?php if ($timezone=="America/Guyana") echo "selected"; ?>>Guyana</option>
                    <option value="America/Halifax" <?php if ($timezone=="America/Halifax") echo "selected"; ?>>Halifax</option>
                    <option value="America/Hermosillo" <?php if ($timezone=="America/Hermosillo") echo "selected"; ?>>Hermosillo</option>
                    <option value="America/Indiana/Indianapolis" <?php if ($timezone=="America/Indiana/Indianapolis") echo "selected"; ?>>Indiana - Indianapolis</option>
                    <option value="America/Indiana/Knox" <?php if ($timezone=="America/Indiana/Knox") echo "selected"; ?>>Indiana - Knox</option>
                    <option value="America/Indiana/Marengo" <?php if ($timezone=="America/Indiana/Marengo") echo "selected"; ?>>Indiana - Marengo</option>
                    <option value="America/Indiana/Petersburg" <?php if ($timezone=="America/Indiana/Petersburg") echo "selected"; ?>>Indiana - Pietroburgo</option>
                    <option value="America/Indiana/Tell_City" <?php if ($timezone=="America/Indiana/Tell_City") echo "selected"; ?>>Indiana - Tell City</option>
                    <option value="America/Indiana/Vevay" <?php if ($timezone=="America/Indiana/Vevay") echo "selected"; ?>>Indiana - Vevay</option>
                    <option value="America/Indiana/Vincennes" <?php if ($timezone=="America/Indiana/Vincennes") echo "selected"; ?>>Indiana - Vincennes</option>
                    <option value="America/Indiana/Winamac" <?php if ($timezone=="America/Indiana/Winamac") echo "selected"; ?>>Indiana - Winamac</option>
                    <option value="America/Inuvik" <?php if ($timezone=="America/Inuvik") echo "selected"; ?>>Inuvik</option>
                    <option value="America/Iqaluit" <?php if ($timezone=="America/Iqaluit") echo "selected"; ?>>Iqaluit</option>
                    <option value="America/Juneau" <?php if ($timezone=="America/Juneau") echo "selected"; ?>>Juneau</option>
                    <option value="America/Kentucky/Louisville" <?php if ($timezone=="America/Kentucky/Louisville") echo "selected"; ?>>Kentucky - Louisville</option>
                    <option value="America/Kentucky/Monticello" <?php if ($timezone=="America/Kentucky/Monticello") echo "selected"; ?>>Kentucky - Monticello</option>
                    <option value="America/Kralendijk" <?php if ($timezone=="America/Kralendijk") echo "selected"; ?>>Kralendijk</option>
                    <option value="America/Havana" <?php if ($timezone=="America/Havana") echo "selected"; ?>>L'Avana</option>
                    <option value="America/La_Paz" <?php if ($timezone=="America/La_Paz") echo "selected"; ?>>La Paz</option>
                    <option value="America/Lima" <?php if ($timezone=="America/Lima") echo "selected"; ?>>Lima</option>
                    <option value="America/Los_Angeles" <?php if ($timezone=="America/Los_Angeles") echo "selected"; ?>>Los Angeles</option>
                    <option value="America/Lower_Princes" <?php if ($timezone=="America/Lower_Princes") echo "selected"; ?>>Lower Princes</option>
                    <option value="America/Maceio" <?php if ($timezone=="America/Maceio") echo "selected"; ?>>Maceio</option>
                    <option value="America/Managua" <?php if ($timezone=="America/Managua") echo "selected"; ?>>Managua</option>
                    <option value="America/Manaus" <?php if ($timezone=="America/Manaus") echo "selected"; ?>>Manaus</option>
                    <option value="America/Marigot" <?php if ($timezone=="America/Marigot") echo "selected"; ?>>Marigot</option>
                    <option value="America/Martinique" <?php if ($timezone=="America/Martinique") echo "selected"; ?>>Martinica</option>
                    <option value="America/Matamoros" <?php if ($timezone=="America/Matamoros") echo "selected"; ?>>Matamoros</option>
                    <option value="America/Mazatlan" <?php if ($timezone=="America/Mazatlan") echo "selected"; ?>>Mazatlan</option>
                    <option value="America/Menominee" <?php if ($timezone=="America/Menominee") echo "selected"; ?>>Menominee</option>
                    <option value="America/Merida" <?php if ($timezone=="America/Merida") echo "selected"; ?>>Merida</option>
                    <option value="America/Metlakatla" <?php if ($timezone=="America/Metlakatla") echo "selected"; ?>>Metlakatla</option>
                    <option value="America/Miquelon" <?php if ($timezone=="America/Miquelon") echo "selected"; ?>>Miquelon</option>
                    <option value="America/Moncton" <?php if ($timezone=="America/Moncton") echo "selected"; ?>>Moncton</option>
                    <option value="America/Monterrey" <?php if ($timezone=="America/Monterrey") echo "selected"; ?>>Monterrey</option>
                    <option value="America/Montevideo" <?php if ($timezone=="America/Montevideo") echo "selected"; ?>>Montevideo</option>
                    <option value="America/Montreal" <?php if ($timezone=="America/Montreal") echo "selected"; ?>>Montreal</option>
                    <option value="America/Montserrat" <?php if ($timezone=="America/Montserrat") echo "selected"; ?>>Montserrat</option>
                    <option value="America/Nassau" <?php if ($timezone=="America/Nassau") echo "selected"; ?>>Nassau</option>
                    <option value="America/New_York" <?php if ($timezone=="America/New_York") echo "selected"; ?>>New York</option>
                    <option value="America/Nipigon" <?php if ($timezone=="America/Nipigon") echo "selected"; ?>>Nipigon</option>
                    <option value="America/Nome" <?php if ($timezone=="America/Nome") echo "selected"; ?>>Nome</option>
                    <option value="America/North_Dakota/Beulah" <?php if ($timezone=="America/North_Dakota/Beulah") echo "selected"; ?>>Nord Dakota - Beulah</option>
                    <option value="America/North_Dakota/Center" <?php if ($timezone=="America/North_Dakota/Center") echo "selected"; ?>>Nord Dakota - Centro</option>
                    <option value="America/North_Dakota/New_Salem" <?php if ($timezone=="America/North_Dakota/New_Salem") echo "selected"; ?>>Nord Dakota - New Salem</option>
                    <option value="America/Noronha" <?php if ($timezone=="America/Noronha") echo "selected"; ?>>Noronha</option>
                    <option value="America/Ojinaga" <?php if ($timezone=="America/Ojinaga") echo "selected"; ?>>Ojinaga</option>
                    <option value="America/Panama" <?php if ($timezone=="America/Panama") echo "selected"; ?>>Panama</option>
                    <option value="America/Pangnirtung" <?php if ($timezone=="America/Pangnirtung") echo "selected"; ?>>Pangnirtung</option>
                    <option value="America/Paramaribo" <?php if ($timezone=="America/Paramaribo") echo "selected"; ?>>Paramaribo</option>
                    <option value="America/Phoenix" <?php if ($timezone=="America/Phoenix") echo "selected"; ?>>Phoenix</option>
                    <option value="America/Port-au-Prince" <?php if ($timezone=="America/Port-au-Prince") echo "selected"; ?>>Port-au-Prince</option>
                    <option value="America/Port_of_Spain" <?php if ($timezone=="America/Port_of_Spain") echo "selected"; ?>>Port of Spain</option>
                    <option value="America/Porto_Velho" <?php if ($timezone=="America/Porto_Velho") echo "selected"; ?>>Porto Velho</option>
                    <option value="America/Puerto_Rico" <?php if ($timezone=="America/Puerto_Rico") echo "selected"; ?>>Puerto Rico</option>
                    <option value="America/Rainy_River" <?php if ($timezone=="America/Rainy_River") echo "selected"; ?>>Rainy River</option>
                    <option value="America/Rankin_Inlet" <?php if ($timezone=="America/Rankin_Inlet") echo "selected"; ?>>Rankin Inlet</option>
                    <option value="America/Recife" <?php if ($timezone=="America/Recife") echo "selected"; ?>>Recife</option>
                    <option value="America/Regina" <?php if ($timezone=="America/Regina") echo "selected"; ?>>Regina</option>
                    <option value="America/Rio_Branco" <?php if ($timezone=="America/Rio_Branco") echo "selected"; ?>>Rio Branco</option>
                    <option value="America/Resolute" <?php if ($timezone=="America/Resolute") echo "selected"; ?>>Risoluto</option>
                    <option value="America/St_Barthelemy" <?php if ($timezone=="America/St_Barthelemy") echo "selected"; ?>>Saint Barthelemy</option>
                    <option value="America/Sao_Paulo" <?php if ($timezone=="America/Sao_Paulo") echo "selected"; ?>>San Paolo</option>
                    <option value="America/Santa_Isabel" <?php if ($timezone=="America/Santa_Isabel") echo "selected"; ?>>Santa Isabel</option>
                    <option value="America/Santarem" <?php if ($timezone=="America/Santarem") echo "selected"; ?>>Santarem</option>
                    <option value="America/Santiago" <?php if ($timezone=="America/Santiago") echo "selected"; ?>>Santiago</option>
                    <option value="America/Santo_Domingo" <?php if ($timezone=="America/Santo_Domingo") echo "selected"; ?>>Santo Domingo</option>
                    <option value="America/Scoresbysund" <?php if ($timezone=="America/Scoresbysund") echo "selected"; ?>>Scoresbysund</option>
                    <option value="America/Shiprock" <?php if ($timezone=="America/Shiprock") echo "selected"; ?>>Shiprock</option>
                    <option value="America/Sitka" <?php if ($timezone=="America/Sitka") echo "selected"; ?>>Sitka</option>
                    <option value="America/St_Johns" <?php if ($timezone=="America/St_Johns") echo "selected"; ?>>St Johns</option>
                    <option value="America/St_Kitts" <?php if ($timezone=="America/St_Kitts") echo "selected"; ?>>St Kitts</option>
                    <option value="America/St_Lucia" <?php if ($timezone=="America/St_Lucia") echo "selected"; ?>>St Lucia</option>
                    <option value="America/St_Thomas" <?php if ($timezone=="America/St_Thomas") echo "selected"; ?>>St Thomas</option>
                    <option value="America/St_Vincent" <?php if ($timezone=="America/St_Vincent") echo "selected"; ?>>St Vincent</option>
                    <option value="America/Swift_Current" <?php if ($timezone=="America/Swift_Current") echo "selected"; ?>>Swift Current</option>
                    <option value="America/Tegucigalpa" <?php if ($timezone=="America/Tegucigalpa") echo "selected"; ?>>Tegucigalpa</option>
                    <option value="America/Thule" <?php if ($timezone=="America/Thule") echo "selected"; ?>>Thule</option>
                    <option value="America/Thunder_Bay" <?php if ($timezone=="America/Thunder_Bay") echo "selected"; ?>>Thunder Bay</option>
                    <option value="America/Tijuana" <?php if ($timezone=="America/Tijuana") echo "selected"; ?>>Tijuana</option>
                    <option value="America/Toronto" <?php if ($timezone=="America/Toronto") echo "selected"; ?>>Toronto</option>
                    <option value="America/Tortola" <?php if ($timezone=="America/Tortola") echo "selected"; ?>>Tortola</option>
                    <option value="America/Vancouver" <?php if ($timezone=="America/Vancouver") echo "selected"; ?>>Vancouver</option>
                    <option value="America/Whitehorse" <?php if ($timezone=="America/Whitehorse") echo "selected"; ?>>Whitehorse</option>
                    <option value="America/Winnipeg" <?php if ($timezone=="America/Winnipeg") echo "selected"; ?>>Winnipeg</option>
                    <option value="America/Yakutat" <?php if ($timezone=="America/Yakutat") echo "selected"; ?>>Yakutat</option>
                    <option value="America/Yellowknife" <?php if ($timezone=="America/Yellowknife") echo "selected"; ?>>Yellowknife</option>
                    </optgroup>
                    <optgroup label="Antartide">
                    <option value="Antarctica/Casey" <?php if ($timezone=="Antarctica/Casey") echo "selected"; ?>>Casey</option>
                    <option value="Antarctica/Davis" <?php if ($timezone=="Antarctica/Davis") echo "selected"; ?>>Davis</option>
                    <option value="Antarctica/DumontDUrville" <?php if ($timezone=="Antarctica/DumontDUrville") echo "selected"; ?>>DumontDUrville</option>
                    <option value="Antarctica/Macquarie" <?php if ($timezone=="Antarctica/Macquarie") echo "selected"; ?>>Macquarie</option>
                    <option value="Antarctica/Mawson" <?php if ($timezone=="Antarctica/Mawson") echo "selected"; ?>>Mawson</option>
                    <option value="Antarctica/McMurdo" <?php if ($timezone=="Antarctica/McMurdo") echo "selected"; ?>>McMurdo</option>
                    <option value="Antarctica/Palmer" <?php if ($timezone=="Antarctica/Palmer") echo "selected"; ?>>Palmer</option>
                    <option value="Antarctica/South_Pole" <?php if ($timezone=="Antarctica/South_Pole") echo "selected"; ?>>Polo sud</option>
                    <option value="Antarctica/Rothera" <?php if ($timezone=="Antarctica/Rothera") echo "selected"; ?>>Rothera</option>
                    <option value="Antarctica/Syowa" <?php if ($timezone=="Antarctica/Syowa") echo "selected"; ?>>Syowa</option>
                    <option value="Antarctica/Vostok" <?php if ($timezone=="Antarctica/Vostok") echo "selected"; ?>>Vostok</option>
                    </optgroup>
                    <optgroup label="Artico">
                    <option value="Arctic/Longyearbyen" <?php if ($timezone=="Arctic/Longyearbyen") echo "selected"; ?>>Longyearbyen</option>
                    </optgroup>
                    <optgroup label="Asia">
                    <option value="Asia/Aden" <?php if ($timezone=="Asia/Aden") echo "selected"; ?>>Aden</option>
                    <option value="Asia/Almaty" <?php if ($timezone=="Asia/Almaty") echo "selected"; ?>>Almaty</option>
                    <option value="Asia/Amman" <?php if ($timezone=="Asia/Amman") echo "selected"; ?>>Amman</option>
                    <option value="Asia/Anadyr" <?php if ($timezone=="Asia/Anadyr") echo "selected"; ?>>Anadyr</option>
                    <option value="Asia/Aqtau" <?php if ($timezone=="Asia/Aqtau") echo "selected"; ?>>Aqtau</option>
                    <option value="Asia/Aqtobe" <?php if ($timezone=="Asia/Aqtobe") echo "selected"; ?>>Aqtobe</option>
                    <option value="Asia/Ashgabat" <?php if ($timezone=="Asia/Ashgabat") echo "selected"; ?>>Ashgabat</option>
                    <option value="Asia/Baghdad" <?php if ($timezone=="Asia/Baghdad") echo "selected"; ?>>Baghdad</option>
                    <option value="Asia/Bahrain" <?php if ($timezone=="Asia/Bahrain") echo "selected"; ?>>Bahrain</option>
                    <option value="Asia/Baku" <?php if ($timezone=="Asia/Baku") echo "selected"; ?>>Baku</option>
                    <option value="Asia/Bangkok" <?php if ($timezone=="Asia/Bangkok") echo "selected"; ?>>Bangkok</option>
                    <option value="Asia/Beirut" <?php if ($timezone=="Asia/Beirut") echo "selected"; ?>>Beirut</option>
                    <option value="Asia/Bishkek" <?php if ($timezone=="Asia/Bishkek") echo "selected"; ?>>Bishkek</option>
                    <option value="Asia/Brunei" <?php if ($timezone=="Asia/Brunei") echo "selected"; ?>>Brunei</option>
                    <option value="Asia/Choibalsan" <?php if ($timezone=="Asia/Choibalsan") echo "selected"; ?>>Choibalsan</option>
                    <option value="Asia/Chongqing" <?php if ($timezone=="Asia/Chongqing") echo "selected"; ?>>Chongqing</option>
                    <option value="Asia/Colombo" <?php if ($timezone=="Asia/Colombo") echo "selected"; ?>>Colombo</option>
                    <option value="Asia/Damascus" <?php if ($timezone=="Asia/Damascus") echo "selected"; ?>>Damasco</option>
                    <option value="Asia/Dhaka" <?php if ($timezone=="Asia/Dhaka") echo "selected"; ?>>Dhaka</option>
                    <option value="Asia/Dili" <?php if ($timezone=="Asia/Dili") echo "selected"; ?>>Dili</option>
                    <option value="Asia/Dubai" <?php if ($timezone=="Asia/Dubai") echo "selected"; ?>>Dubai</option>
                    <option value="Asia/Dushanbe" <?php if ($timezone=="Asia/Dushanbe") echo "selected"; ?>>Dushanbe</option>
                    <option value="Asia/Yekaterinburg" <?php if ($timezone=="Asia/Yekaterinburg") echo "selected"; ?>>Ekaterinburg</option>
                    <option value="Asia/Gaza" <?php if ($timezone=="Asia/Gaza") echo "selected"; ?>>Gaza</option>
                    <option value="Asia/Jerusalem" <?php if ($timezone=="Asia/Jerusalem") echo "selected"; ?>>Gerusalemme</option>
                    <option value="Asia/Harbin" <?php if ($timezone=="Asia/Harbin") echo "selected"; ?>>Harbin</option>
                    <option value="Asia/Hebron" <?php if ($timezone=="Asia/Hebron") echo "selected"; ?>>Hebron</option>
                    <option value="Asia/Ho_Chi_Minh" <?php if ($timezone=="Asia/Ho_Chi_Minh") echo "selected"; ?>>Ho Chi Minh</option>
                    <option value="Asia/Hong_Kong" <?php if ($timezone=="Asia/Hong_Kong") echo "selected"; ?>>Hong Kong</option>
                    <option value="Asia/Hovd" <?php if ($timezone=="Asia/Hovd") echo "selected"; ?>>Hovd</option>
                    <option value="Asia/Irkutsk" <?php if ($timezone=="Asia/Irkutsk") echo "selected"; ?>>Irkutsk</option>
                    <option value="Asia/Jakarta" <?php if ($timezone=="Asia/Jakarta") echo "selected"; ?>>Jakarta</option>
                    <option value="Asia/Jayapura" <?php if ($timezone=="Asia/Jayapura") echo "selected"; ?>>Jayapura</option>
                    <option value="Asia/Kabul" <?php if ($timezone=="Asia/Kabul") echo "selected"; ?>>Kabul</option>
                    <option value="Asia/Kamchatka" <?php if ($timezone=="Asia/Kamchatka") echo "selected"; ?>>Kamchatka</option>
                    <option value="Asia/Karachi" <?php if ($timezone=="Asia/Karachi") echo "selected"; ?>>Karachi</option>
                    <option value="Asia/Kashgar" <?php if ($timezone=="Asia/Kashgar") echo "selected"; ?>>Kashgar</option>
                    <option value="Asia/Kathmandu" <?php if ($timezone=="Asia/Kathmandu") echo "selected"; ?>>Kathmandu</option>
                    <option value="Asia/Khandyga" <?php if ($timezone=="Asia/Khandyga") echo "selected"; ?>>Khandyga</option>
                    <option value="Asia/Kolkata" <?php if ($timezone=="Asia/Kolkata") echo "selected"; ?>>Kolkata</option>
                    <option value="Asia/Krasnoyarsk" <?php if ($timezone=="Asia/Krasnoyarsk") echo "selected"; ?>>Krasnoyarsk</option>
                    <option value="Asia/Kuala_Lumpur" <?php if ($timezone=="Asia/Kuala_Lumpur") echo "selected"; ?>>Kuala Lumpur</option>
                    <option value="Asia/Kuching" <?php if ($timezone=="Asia/Kuching") echo "selected"; ?>>Kuching</option>
                    <option value="Asia/Kuwait" <?php if ($timezone=="Asia/Kuwait") echo "selected"; ?>>Kuwait</option>
                    <option value="Asia/Macau" <?php if ($timezone=="Asia/Macau") echo "selected"; ?>>Macao</option>
                    <option value="Asia/Magadan" <?php if ($timezone=="Asia/Magadan") echo "selected"; ?>>Magadan</option>
                    <option value="Asia/Makassar" <?php if ($timezone=="Asia/Makassar") echo "selected"; ?>>Makassar</option>
                    <option value="Asia/Manila" <?php if ($timezone=="Asia/Manila") echo "selected"; ?>>Manila</option>
                    <option value="Asia/Muscat" <?php if ($timezone=="Asia/Muscat") echo "selected"; ?>>Muscat</option>
                    <option value="Asia/Nicosia" <?php if ($timezone=="Asia/Nicosia") echo "selected"; ?>>Nicosia</option>
                    <option value="Asia/Novokuznetsk" <?php if ($timezone=="Asia/Novokuznetsk") echo "selected"; ?>>Novokuznetsk</option>
                    <option value="Asia/Novosibirsk" <?php if ($timezone=="Asia/Novosibirsk") echo "selected"; ?>>Novosibirsk</option>
                    <option value="Asia/Omsk" <?php if ($timezone=="Asia/Omsk") echo "selected"; ?>>Omsk</option>
                    <option value="Asia/Oral" <?php if ($timezone=="Asia/Oral") echo "selected"; ?>>Oral</option>
                    <option value="Asia/Phnom_Penh" <?php if ($timezone=="Asia/Phnom_Penh") echo "selected"; ?>>Phnom Penh</option>
                    <option value="Asia/Pontianak" <?php if ($timezone=="Asia/Pontianak") echo "selected"; ?>>Pontianak</option>
                    <option value="Asia/Pyongyang" <?php if ($timezone=="Asia/Pyongyang") echo "selected"; ?>>Pyongyang</option>
                    <option value="Asia/Qatar" <?php if ($timezone=="Asia/Qatar") echo "selected"; ?>>Qatar</option>
                    <option value="Asia/Qyzylorda" <?php if ($timezone=="Asia/Qyzylorda") echo "selected"; ?>>Qyzylorda</option>
                    <option value="Asia/Rangoon" <?php if ($timezone=="Asia/Rangoon") echo "selected"; ?>>Rangoon</option>
                    <option value="Asia/Riyadh" <?php if ($timezone=="Asia/Riyadh") echo "selected"; ?>>Riyadh</option>
                    <option value="Asia/Sakhalin" <?php if ($timezone=="Asia/Sakhalin") echo "selected"; ?>>Sakhalin</option>
                    <option value="Asia/Samarkand" <?php if ($timezone=="Asia/Samarkand") echo "selected"; ?>>Samarcanda</option>
                    <option value="Asia/Seoul" <?php if ($timezone=="Asia/Seoul") echo "selected"; ?>>Seoul</option>
                    <option value="Asia/Shanghai" <?php if ($timezone=="Asia/Shanghai") echo "selected"; ?>>Shanghai</option>
                    <option value="Asia/Singapore" <?php if ($timezone=="Asia/Singapore") echo "selected"; ?>>Singapore</option>
                    <option value="Asia/Taipei" <?php if ($timezone=="Asia/Taipei") echo "selected"; ?>>Taipei</option>
                    <option value="Asia/Tashkent" <?php if ($timezone=="Asia/Tashkent") echo "selected"; ?>>Tashkent</option>
                    <option value="Asia/Tbilisi" <?php if ($timezone=="Asia/Tbilisi") echo "selected"; ?>>Tbilisi</option>
                    <option value="Asia/Tehran" <?php if ($timezone=="Asia/Tehran") echo "selected"; ?>>Teheran</option>
                    <option value="Asia/Thimphu" <?php if ($timezone=="Asia/Thimphu") echo "selected"; ?>>Thimphu</option>
                    <option value="Asia/Tokyo" <?php if ($timezone=="Asia/Tokyo") echo "selected"; ?>>Tokyo</option>
                    <option value="Asia/Ulaanbaatar" <?php if ($timezone=="Asia/Ulaanbaatar") echo "selected"; ?>>Ulaanbaatar</option>
                    <option value="Asia/Urumqi" <?php if ($timezone=="Asia/Urumqi") echo "selected"; ?>>Urumqi</option>
                    <option value="Asia/Ust-Nera" <?php if ($timezone=="Asia/Ust-Nera") echo "selected"; ?>>Ust-Nera</option>
                    <option value="Asia/Vientiane" <?php if ($timezone=="Asia/Vientiane") echo "selected"; ?>>Vientiane</option>
                    <option value="Asia/Vladivostok" <?php if ($timezone=="Asia/Vladivostok") echo "selected"; ?>>Vladivostok</option>
                    <option value="Asia/Yakutsk" <?php if ($timezone=="Asia/Yakutsk") echo "selected"; ?>>Yakutsk</option>
                    <option value="Asia/Yerevan" <?php if ($timezone=="Asia/Yerevan") echo "selected"; ?>>Yerevan</option>
                    </optgroup>
                    <optgroup label="Atlantico">
                    <option value="Atlantic/Azores" <?php if ($timezone=="Atlantic/Azores") echo "selected"; ?>>Azzorre</option>
                    <option value="Atlantic/Bermuda" <?php if ($timezone=="Atlantic/Bermuda") echo "selected"; ?>>Bermuda</option>
                    <option value="Atlantic/Canary" <?php if ($timezone=="Atlantic/Canary") echo "selected"; ?>>Canarie</option>
                    <option value="Atlantic/Cape_Verde" <?php if ($timezone=="Atlantic/Cape_Verde") echo "selected"; ?>>Capo Verde</option>
                    <option value="Atlantic/Faroe" <?php if ($timezone=="Atlantic/Faroe") echo "selected"; ?>>Faroe</option>
                    <option value="Atlantic/South_Georgia" <?php if ($timezone=="Atlantic/South_Georgia") echo "selected"; ?>>Georgia del Sud</option>
                    <option value="Atlantic/Madeira" <?php if ($timezone=="Atlantic/Madeira") echo "selected"; ?>>Madera</option>
                    <option value="Atlantic/Reykjavik" <?php if ($timezone=="Atlantic/Reykjavik") echo "selected"; ?>>Reykjavik</option>
                    <option value="Atlantic/St_Helena" <?php if ($timezone=="Atlantic/St_Helena") echo "selected"; ?>>Sant'Elena</option>
                    <option value="Atlantic/Stanley" <?php if ($timezone=="Atlantic/Stanley") echo "selected"; ?>>Stanley</option>
                    </optgroup>
                    <optgroup label="Australia">
                    <option value="Australia/Adelaide" <?php if ($timezone=="Australia/Adelaide") echo "selected"; ?>>Adelaide</option>
                    <option value="Australia/Brisbane" <?php if ($timezone=="Australia/Brisbane") echo "selected"; ?>>Brisbane</option>
                    <option value="Australia/Broken_Hill" <?php if ($timezone=="Australia/Broken_Hill") echo "selected"; ?>>Broken Hill</option>
                    <option value="Australia/Currie" <?php if ($timezone=="Australia/Currie") echo "selected"; ?>>Currie</option>
                    <option value="Australia/Darwin" <?php if ($timezone=="Australia/Darwin") echo "selected"; ?>>Darwin</option>
                    <option value="Australia/Eucla" <?php if ($timezone=="Australia/Eucla") echo "selected"; ?>>Eucla</option>
                    <option value="Australia/Hobart" <?php if ($timezone=="Australia/Hobart") echo "selected"; ?>>Hobart</option>
                    <option value="Australia/Lindeman" <?php if ($timezone=="Australia/Lindeman") echo "selected"; ?>>Lindeman</option>
                    <option value="Australia/Lord_Howe" <?php if ($timezone=="Australia/Lord_Howe") echo "selected"; ?>>Lord Howe</option>
                    <option value="Australia/Melbourne" <?php if ($timezone=="Australia/Melbourne") echo "selected"; ?>>Melbourne</option>
                    <option value="Australia/Perth" <?php if ($timezone=="Australia/Perth") echo "selected"; ?>>Perth</option>
                    <option value="Australia/Sydney" <?php if ($timezone=="Australia/Sydney") echo "selected"; ?>>Sydney</option>
                    </optgroup>
                    <optgroup label="Europa">
                    <option value="Europe/Amsterdam" <?php if ($timezone=="Europe/Amsterdam") echo "selected"; ?>>Amsterdam</option>
                    <option value="Europe/Andorra" <?php if ($timezone=="Europe/Andorra") echo "selected"; ?>>Andorra</option>
                    <option value="Europe/Athens" <?php if ($timezone=="Europe/Athens") echo "selected"; ?>>Atene</option>
                    <option value="Europe/Belgrade" <?php if ($timezone=="Europe/Belgrade") echo "selected"; ?>>Belgrado</option>
                    <option value="Europe/Berlin" <?php if ($timezone=="Europe/Berlin") echo "selected"; ?>>Berlino</option>
                    <option value="Europe/Bratislava" <?php if ($timezone=="Europe/Bratislava") echo "selected"; ?>>Bratislava</option>
                    <option value="Europe/Brussels" <?php if ($timezone=="Europe/Brussels") echo "selected"; ?>>Bruxelles</option>
                    <option value="Europe/Bucharest" <?php if ($timezone=="Europe/Bucharest") echo "selected"; ?>>Bucarest</option>
                    <option value="Europe/Budapest" <?php if ($timezone=="Europe/Budapest") echo "selected"; ?>>Budapest</option>
                    <option value="Europe/Busingen" <?php if ($timezone=="Europe/Busingen") echo "selected"; ?>>Busingen</option>
                    <option value="Europe/Chisinau" <?php if ($timezone=="Europe/Chisinau") echo "selected"; ?>>Chisinau</option>
                    <option value="Europe/Copenhagen" <?php if ($timezone=="Europe/Copenhagen") echo "selected"; ?>>Copenaghen</option>
                    <option value="Europe/Dublin" <?php if ($timezone=="Europe/Dublin") echo "selected"; ?>>Dublino</option>
                    <option value="Europe/Gibraltar" <?php if ($timezone=="Europe/Gibraltar") echo "selected"; ?>>Gibilterra</option>
                    <option value="Europe/Guernsey" <?php if ($timezone=="Europe/Guernsey") echo "selected"; ?>>Guernsey</option>
                    <option value="Europe/Helsinki" <?php if ($timezone=="Europe/Helsinki") echo "selected"; ?>>Helsinki</option>
                    <option value="Europe/Isle_of_Man" <?php if ($timezone=="Europe/Isle_of_Man") echo "selected"; ?>>Isola di Man</option>
                    <option value="Europe/Istanbul" <?php if ($timezone=="Europe/Istanbul") echo "selected"; ?>>Istanbul</option>
                    <option value="Europe/Kaliningrad" <?php if ($timezone=="Europe/Kaliningrad") echo "selected"; ?>>Kaliningrad</option>
                    <option value="Europe/Kiev" <?php if ($timezone=="Europe/Kiev") echo "selected"; ?>>Kiev</option>
                    <option value="Europe/Lisbon" <?php if ($timezone=="Europe/Lisbon") echo "selected"; ?>>Lisbona</option>
                    <option value="Europe/London" <?php if ($timezone=="Europe/London") echo "selected"; ?>>Londra</option>
                    <option value="Europe/Ljubljana" <?php if ($timezone=="Europe/Ljubljana") echo "selected"; ?>>Lubiana</option>
                    <option value="Europe/Luxembourg" <?php if ($timezone=="Europe/Luxembourg") echo "selected"; ?>>Lussemburgo</option>
                    <option value="Europe/Madrid" <?php if ($timezone=="Europe/Madrid") echo "selected"; ?>>Madrid</option>
                    <option value="Europe/Jersey" <?php if ($timezone=="Europe/Jersey") echo "selected"; ?>>Maglia</option>
                    <option value="Europe/Malta" <?php if ($timezone=="Europe/Malta") echo "selected"; ?>>Malta</option>
                    <option value="Europe/Mariehamn" <?php if ($timezone=="Europe/Mariehamn") echo "selected"; ?>>Mariehamn</option>
                    <option value="Europe/Minsk" <?php if ($timezone=="Europe/Minsk") echo "selected"; ?>>Minsk</option>
                    <option value="Europe/Monaco" <?php if ($timezone=="Europe/Monaco") echo "selected"; ?>>Monaco</option>
                    <option value="Europe/Moscow" <?php if ($timezone=="Europe/Moscow") echo "selected"; ?>>Mosca</option>
                    <option value="Europe/Oslo" <?php if ($timezone=="Europe/Oslo") echo "selected"; ?>>Oslo</option>
                    <option value="Europe/Paris" <?php if ($timezone=="Europe/Paris") echo "selected"; ?>>Parigi</option>
                    <option value="Europe/Podgorica" <?php if ($timezone=="Europe/Podgorica") echo "selected"; ?>>Podgorica</option>
                    <option value="Europe/Prague" <?php if ($timezone=="Europe/Prague") echo "selected"; ?>>Praga</option>
                    <option value="Europe/Riga" <?php if ($timezone=="Europe/Riga") echo "selected"; ?>>Riga</option>
                    <option value="Europe/Rome" <?php if ($timezone=="Europe/Rome") echo "selected"; ?>>Roma</option>
                    <option value="Europe/Samara" <?php if ($timezone=="Europe/Samara") echo "selected"; ?>>Samara</option>
                    <option value="Europe/San_Marino" <?php if ($timezone=="Europe/San_Marino") echo "selected"; ?>>San Marino</option>
                    <option value="Europe/Sarajevo" <?php if ($timezone=="Europe/Sarajevo") echo "selected"; ?>>Sarajevo</option>
                    <option value="Europe/Simferopol" <?php if ($timezone=="Europe/Simferopol") echo "selected"; ?>>Simferopol</option>
                    <option value="Europe/Skopje" <?php if ($timezone=="Europe/Skopje") echo "selected"; ?>>Skopje</option>
                    <option value="Europe/Sofia" <?php if ($timezone=="Europe/Sofia") echo "selected"; ?>>Sofia</option>
                    <option value="Europe/Stockholm" <?php if ($timezone=="Europe/Stockholm") echo "selected"; ?>>Stoccolma</option>
                    <option value="Europe/Tallinn" <?php if ($timezone=="Europe/Tallinn") echo "selected"; ?>>Tallinn</option>
                    <option value="Europe/Tirane" <?php if ($timezone=="Europe/Tirane") echo "selected"; ?>>Tirana</option>
                    <option value="Europe/Uzhgorod" <?php if ($timezone=="Europe/Uzhgorod") echo "selected"; ?>>Uzhgorod</option>
                    <option value="Europe/Vaduz" <?php if ($timezone=="Europe/Vaduz") echo "selected"; ?>>Vaduz</option>
                    <option value="Europe/Warsaw" <?php if ($timezone=="Europe/Warsaw") echo "selected"; ?>>Varsavia</option>
                    <option value="Europe/Vatican" <?php if ($timezone=="Europe/Vatican") echo "selected"; ?>>Vaticano</option>
                    <option value="Europe/Vienna" <?php if ($timezone=="Europe/Vienna") echo "selected"; ?>>Vienna</option>
                    <option value="Europe/Vilnius" <?php if ($timezone=="Europe/Vilnius") echo "selected"; ?>>Vilnius</option>
                    <option value="Europe/Volgograd" <?php if ($timezone=="Europe/Volgograd") echo "selected"; ?>>Volgograd</option>
                    <option value="Europe/Zagreb" <?php if ($timezone=="Europe/Zagreb") echo "selected"; ?>>Zagabria</option>
                    <option value="Europe/Zaporozhye" <?php if ($timezone=="Europe/Zaporozhye") echo "selected"; ?>>Zaporozhye</option>
                    <option value="Europe/Zurich" <?php if ($timezone=="Europe/Zurich") echo "selected"; ?>>Zurigo</option>
                    </optgroup>
                    <optgroup label="Indiano">
                    <option value="Indian/Antananarivo" <?php if ($timezone=="Indian/Antananarivo") echo "selected"; ?>>Antananarivo</option>
                    <option value="Indian/Chagos" <?php if ($timezone=="Indian/Chagos") echo "selected"; ?>>Chagos</option>
                    <option value="Indian/Cocos" <?php if ($timezone=="Indian/Cocos") echo "selected"; ?>>Cocos</option>
                    <option value="Indian/Comoro" <?php if ($timezone=="Indian/Comoro") echo "selected"; ?>>Comore</option>
                    <option value="Indian/Kerguelen" <?php if ($timezone=="Indian/Kerguelen") echo "selected"; ?>>Kerguelen</option>
                    <option value="Indian/Mahe" <?php if ($timezone=="Indian/Mahe") echo "selected"; ?>>Mahe</option>
                    <option value="Indian/Maldives" <?php if ($timezone=="Indian/Maldives") echo "selected"; ?>>Maldive</option>
                    <option value="Indian/Mauritius" <?php if ($timezone=="Indian/Mauritius") echo "selected"; ?>>Mauritius</option>
                    <option value="Indian/Mayotte" <?php if ($timezone=="Indian/Mayotte") echo "selected"; ?>>Mayotte</option>
                    <option value="Indian/Christmas" <?php if ($timezone=="Indian/Christmas") echo "selected"; ?>>Natale</option>
                    <option value="Indian/Reunion" <?php if ($timezone=="Indian/Reunion") echo "selected"; ?>>Reunion</option>
                    </optgroup>
                    <optgroup label="Pacifico">
                    <option value="Pacific/Apia" <?php if ($timezone=="Pacific/Apia") echo "selected"; ?>>Apia</option>
                    <option value="Pacific/Auckland" <?php if ($timezone=="Pacific/Auckland") echo "selected"; ?>>Auckland</option>
                    <option value="Pacific/Chatham" <?php if ($timezone=="Pacific/Chatham") echo "selected"; ?>>Chatham</option>
                    <option value="Pacific/Chuuk" <?php if ($timezone=="Pacific/Chuuk") echo "selected"; ?>>Chuuk</option>
                    <option value="Pacific/Efate" <?php if ($timezone=="Pacific/Efate") echo "selected"; ?>>Efate</option>
                    <option value="Pacific/Enderbury" <?php if ($timezone=="Pacific/Enderbury") echo "selected"; ?>>Enderbury</option>
                    <option value="Pacific/Fakaofo" <?php if ($timezone=="Pacific/Fakaofo") echo "selected"; ?>>Fakaofo</option>
                    <option value="Pacific/Fiji" <?php if ($timezone=="Pacific/Fiji") echo "selected"; ?>>Fiji</option>
                    <option value="Pacific/Funafuti" <?php if ($timezone=="Pacific/Funafuti") echo "selected"; ?>>Funafuti</option>
                    <option value="Pacific/Galapagos" <?php if ($timezone=="Pacific/Galapagos") echo "selected"; ?>>Galapagos</option>
                    <option value="Pacific/Gambier" <?php if ($timezone=="Pacific/Gambier") echo "selected"; ?>>Gambier</option>
                    <option value="Pacific/Guadalcanal" <?php if ($timezone=="Pacific/Guadalcanal") echo "selected"; ?>>Guadalcanal</option>
                    <option value="Pacific/Guam" <?php if ($timezone=="Pacific/Guam") echo "selected"; ?>>Guam</option>
                    <option value="Pacific/Honolulu" <?php if ($timezone=="Pacific/Honolulu") echo "selected"; ?>>Honolulu</option>
                    <option value="Pacific/Johnston" <?php if ($timezone=="Pacific/Johnston") echo "selected"; ?>>Johnston</option>
                    <option value="Pacific/Kiritimati" <?php if ($timezone=="Pacific/Kiritimati") echo "selected"; ?>>Kiritimati</option>
                    <option value="Pacific/Kosrae" <?php if ($timezone=="Pacific/Kosrae") echo "selected"; ?>>Kosrae</option>
                    <option value="Pacific/Kwajalein" <?php if ($timezone=="Pacific/Kwajalein") echo "selected"; ?>>Kwajalein</option>
                    <option value="Pacific/Majuro" <?php if ($timezone=="Pacific/Majuro") echo "selected"; ?>>Majuro</option>
                    <option value="Pacific/Marquesas" <?php if ($timezone=="Pacific/Marquesas") echo "selected"; ?>>Marchesi</option>
                    <option value="Pacific/Midway" <?php if ($timezone=="Pacific/Midway") echo "selected"; ?>>Midway</option>
                    <option value="Pacific/Nauru" <?php if ($timezone=="Pacific/Nauru") echo "selected"; ?>>Nauru</option>
                    <option value="Pacific/Niue" <?php if ($timezone=="Pacific/Niue") echo "selected"; ?>>Niue</option>
                    <option value="Pacific/Norfolk" <?php if ($timezone=="Pacific/Norfolk") echo "selected"; ?>>Norfolk</option>
                    <option value="Pacific/Noumea" <?php if ($timezone=="Pacific/Noumea") echo "selected"; ?>>Noumea</option>
                    <option value="Pacific/Pago_Pago" <?php if ($timezone=="Pacific/Pago_Pago") echo "selected"; ?>>Pago Pago</option>
                    <option value="Pacific/Palau" <?php if ($timezone=="Pacific/Palau") echo "selected"; ?>>Palau</option>
                    <option value="Pacific/Easter" <?php if ($timezone=="Pacific/Easter") echo "selected"; ?>>Pasqua</option>
                    <option value="Pacific/Pitcairn" <?php if ($timezone=="Pacific/Pitcairn") echo "selected"; ?>>Pitcairn</option>
                    <option value="Pacific/Pohnpei" <?php if ($timezone=="Pacific/Pohnpei") echo "selected"; ?>>Pohnpei</option>
                    <option value="Pacific/Port_Moresby" <?php if ($timezone=="Pacific/Port_Moresby") echo "selected"; ?>>Port Moresby</option>
                    <option value="Pacific/Rarotonga" <?php if ($timezone=="Pacific/Rarotonga") echo "selected"; ?>>Rarotonga</option>
                    <option value="Pacific/Saipan" <?php if ($timezone=="Pacific/Saipan") echo "selected"; ?>>Saipan</option>
                    <option value="Pacific/Tahiti" <?php if ($timezone=="Pacific/Tahiti") echo "selected"; ?>>Tahiti</option>
                    <option value="Pacific/Tarawa" <?php if ($timezone=="Pacific/Tarawa") echo "selected"; ?>>Tarawa</option>
                    <option value="Pacific/Tongatapu" <?php if ($timezone=="Pacific/Tongatapu") echo "selected"; ?>>Tongatapu</option>
                    <option value="Pacific/Wake" <?php if ($timezone=="Pacific/Wake") echo "selected"; ?>>Wake</option>
                    <option value="Pacific/Wallis" <?php if ($timezone=="Pacific/Wallis") echo "selected"; ?>>Wallis</option>
                    </optgroup>
                </select>
			</div>
		</div>
        
        <div class="row-fluid">
			<div class="span12">
				<p><strong><?php echo __('Status'); ?></strong></p>
				<p></p>
                    <?php
				
					if ($status=="0") $default = 0; 
					if ($status=="1") $default = 1; 
					
					$options = array(
						0 => "Online",
						1 => __('Maintenance mode')
					);
					
					echo $this->Form->select('status', $options, array(
						'id'=>'status',
						'default'=>$default,
						'empty'=>false
					));
					
					?>
			</div>
		</div>
        
        <div class="row-fluid text-center">
				<div class="span12">
					<p>&nbsp;</p>
					<?php echo $this->Html->image('loader.gif', array('alt' => 'Wait...', 'title'=>'Wait...','style'=>'display:none;','id'=>'loader')); ?>
				</div>
			</div>
            
			<div class="row-fluid">
				<div class="span12">
					<p>&nbsp;</p>
					<?php 
					
					echo $this->Form->button('<i class="icon-ok icon-white"></i> ' .__('Save'),array(
						'id'=>'btnSave',
						'type'=>'button',
						'class'=>'btn btn-large btn-inverse'
					)); 
					
					?>
				</div>
			</div>
            
	</div>
    
</div>

<?php echo $this->Form->end(); ?>

</div>