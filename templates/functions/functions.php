<?php


//This function describes tag zotero for street view. This function generates HTML code for tag zotero of street view with $street_name, $street_new.

 					function zoterostreets($street_name, $street_new, $no_old, $no_new  ){

		    	  	$code_span= '<span class="Z3988" title="url_ver=Z39.88-2004&amp;ctx_ver=Z39.88-2004&amp;rfr_id=info%3Asid%2Fzotero.org%3A2&amp;rft_val_fmt=info%3Aofi%2Ffmt%3Akev%3Amtx%3Abook&amp;rft.genre=bookitem&amp;rft.atitle=';
			        $code_span.=$street_name;
			        $code_span.='&amp;rft.description=neue straße: ';
			        $code_span.=$street_new;
			        $code_span.=' Alt Arrondissement: ' ;
			        $code_span.=$no_old;
			        $code_span.=' Neue Arrondissement: ';
			        $code_span.=$no_new;
			     	  $code_span.='&amp;rft.btitle=Adressbuch%20der%20Deutschen%20in%20Paris%20f%C3%BCr%20das%20Jahr%201854&amp;rft.place=Paris&amp;rft.edition=Elektronische%20Edition&amp;rft.aufirst=F.&amp;rft.aulast=Kronauge&amp;rft.au=F.%20Kronauge&amp;rft.date=1854&amp;rft.language=Allemand">'; 
		        

        	return ($code_span);
                                      }

//This function describes tag zotero for person view. This function generates HTML code for tag zotero of person view with $name, $precision, $precision2, $military_status, $social_status, $occupation_status, $gender, $ldh, $begP.

         function zoteroperson($name, $precision2, $military_status, $social_status, $occupation_status, $gender, $ldh, $houseno, $addr_name, $begP){

				    	  $code_span= '<span class="Z3988" title="url_ver=Z39.88-2004&amp;ctx_ver=Z39.88-2004&amp;rfr_id=info%3Asid%2Fzotero.org%3A2&amp;rft_val_fmt=info%3Aofi%2Ffmt%3Akev%3Amtx%3Abook&amp;rft.genre=bookitem&amp;rft.atitle=';
				        $code_span.=$name;
				        $code_span.='&amp;rft.description=Beruf: ';
				        $code_span.=$precision2;
				        $code_span.=', militärischer Status: ';
				        $code_span.=$military_status;
				        $code_span.=', Sozialer Status: ';
				        $code_span.=$social_status;
				        $code_span.=', Beruflicher Status: ';
				        $code_span.=$occupation_status;
				        $code_span.=', Geschlecht: ';
				        $code_span.=$gender;
				        $code_span.=', Rang in der Ehrenlegion: ';
				        $code_span.=$ldh;
				        $code_span.=', Straße: ';
				        $code_span.=$houseno;
				        $code_span.=' ';
				        $code_span.=$addr_name;
				        $code_span.='&amp;rft.btitle=Adressbuch%20der%20Deutschen%20in%20Paris%20f%C3%BCr%20das%20Jahr%201854&amp;rft.place=Paris&amp;rft.edition=Elektronische%20Edition&amp;rft.aufirst=F.&amp;rft.aulast=Kronauge&amp;rft.au=F.%20Kronauge&amp;rft.date=1854&amp;rft.pages=';
				        $code_span.=$begP;
				        $code_span.= '&amp;rft.language=Allemand"></span>'; 
		        

        	return ($code_span);
                                      }

//This function describes tag zotero for arrondissement view. This function generates HTML code for tag zotero of arrondissement view with $noStr, $aar1.

            function zoteroarr($noStr, $arr1){

		    	$code_span= '<span class="Z3988" title="url_ver=Z39.88-2004&amp;ctx_ver=Z39.88-2004&amp;rfr_id=info%3Asid%2Fzotero.org%3A2&amp;rft_val_fmt=info%3Aofi%2Ffmt%3Akev%3Amtx%3Abook&amp;rft.genre=bookitem&amp;rft.atitle= Das Arrondissement ist : ';
		        $code_span.=$noStr;
		        $code_span.='&amp;rft.description=code INSEE: ';
		        $code_span.=$arr1;
		        $code_span.='&amp;rft.btitle=Adressbuch%20der%20Deutschen%20in%20Paris%20f%C3%BCr%20das%20Jahr%201854&amp;rft.place=Paris&amp;rft.edition=Elektronische%20Edition&amp;rft.aufirst=F.&amp;rft.aulast=Kronauge&amp;rft.au=F.%20Kronauge&amp;rft.date=1854&amp;rft.language=Allemand">'; 
		        

        	return ($code_span);
        }

//This function describes tag zotero for company view. This function generates HTML code for tag zotero of company view with $nachname, $prof_category, $begP:

        function zoterocomp($nachname, $prof_category, $profession, $addr_no, $addr_old, $begP){

    	$code_span= '<span class="Z3988" title="url_ver=Z39.88-2004&amp;ctx_ver=Z39.88-2004&amp;rfr_id=info%3Asid%2Fzotero.org%3A2&amp;rft_val_fmt=info%3Aofi%2Ffmt%3Akev%3Amtx%3Abook&amp;rft.genre=bookitem&amp;rft.atitle=';
    	$code_span.=$nachname;
    	$code_span.='&amp;rft.description=Berufskategorie:';
    	$code_span.=$prof_category;
    	$code_span.=', Berufe:';
    	$code_span.=$profession;
    	$code_span.=', Straße: ';
    	$code_span.=$addr_no;
    	$code_span.=' ';
    	$code_span.=$addr_old;
    	$code_span.='&amp;rft.btitle=Adressbuch%20der%20Deutschen%20in%20Paris%20f%C3%BCr%20das%20Jahr%201854&amp;rft.place=Paris&amp;rft.edition=Elektronische%20Edition&amp;rft.aufirst=F.&amp;rft.aulast=Kronauge&amp;rft.au=F.%20Kronauge&amp;rft.date=1854&amp;rft.pages=';
      $code_span.=$begP;
      $code_span.= '&amp;rft.language=Allemand">';
        

        return ($code_span);
                                      }

//This function describes tag image for person view and company view. This function generates tag image to see Adressbuch's pages in HD with $path, $size, $id, $begP.

					function image($path, $size, $id, $begP)
						{
							$code_html_image = "<a target='_blank' href='http://adressbuch1854.dhi-paris.fr/scans/HD/BHVP_703983_$begP.jpg'>";
							$code_html_image.=" <img src='";
							$code_html_image.= $path;
							$code_html_image.= $size;
							$code_html_image.= $id;
							$code_html_image.= $begP;
							$code_html_image.= ".jpg'";
							$code_html_image.= " width = '100'";
							$code_html_image.= "title= 'IHA zur Nutzung der Seite $begP'></a>";


						return ($code_html_image); 
						}

//Possiblité d'afficher les contenus textuels de chaque à côté des images
				function text($path, $id, $begP)
						{
							$code_text = "<object data='";
							$code_text.= $path;
							$code_text.= $id;
							$code_text.= $begP;
							$code_text.= ".txt'/>";

						
						return ($code_text);
					}

//Possibilité d'enregistrer chaque image avec Zotero
				function scan_zotero($begP)

					{
						$code_scan='<span class="Z3988" title="url_ver=Z39.88-2004&amp;ctx_ver=Z39.88-2004&amp;rfr_id=info%3Asid%2Fzotero.org%3A2&amp;rft_val_fmt=info%3Aofi%2Ffmt%3Akev%3Amtx%3Adc&amp;rft.type=artwork&amp;rft.title=Zeite%20';
						$code_scan.=$begP;
						$code_scan.='%20von%20das%20Adressbuch%20der%20Deutschen%20f%C3%BCr%20das%20Jahr%201854&amp;rft.description=Numerisation&amp;rft.subject=cote%20BHVP_703983_';
						$code_scan.=$begP;
						$code_scan.='&amp;rft.subject=support%20numerique&amp;rft.value=numerisation&amp;bib.memo=numerisation&amp;rtf.note=35446&amp;rft.subject=resolution%20300dpi&amp;rft.abstract=Numerisation&amp;rft.about=numerisation&amp;srft.identifier=http%3A%2F%2Fadressbuch1854.dh.uni-koeln.de%2Fscans%2FSD%2FBHVP_703983_';
						$code_scan.=$begP;
						$code_scan.='.jpg&amp;rft.aufirst=F&amp;rft.aulast=Kronauge&amp;rft.au=F%20Kronauge&amp;rft.date=1854&amp;rft.language=deu%20fra"></span>';

						return($code_scan);
					}

// Si le métier ancien est identique au nouveau de nom de métier on affiche que $precision2, sinon on affiche les 2 dans un tableau (persons)
				/*function profession_person($precision2, $pro_unified)
					{

						if($precision2 === $pro_unified){
        		echo '<td>'.h($precision2).'</td>';
        		}
    				else
        		{
        		echo  '<td><table><tr><th>'. __('Beruf verbatim').'</th><th>'.__('Beruf clean').'</th></tr><tr><td style="border:none">'.$precision2.'</td><td style="border:none">'.$pro_unified.'</td></tr></table><td>';
    				}
    			}*/

// Si le métier ancien est identique au nouveau de nom de métier on affiche que $precision2, sinon on affiche les 2 dans un tableau (companies)
    		/*function profession_company($profession, $p_unified)
					{
						if($profession === $p_unified){
        		echo '<td>'.h($profession).'</td>';
        		}
    				else
        		{
        		echo  '<td><table><tr><th>'. __('Beruf verbatim').'</th><th>'.__('Beruf clean').'</th></tr><tr><td style="border:none">'.$profession.'</td><td style="border:none">'.$p_unified.'</td></tr></table><td>';
    				}
    			}*/