
<?php


//$precision, $precision2, $military_status, $social_status, $occupation_status, $gender, $ldh are 7 variables to save profession's catgeory, profession's name, military's status, social's status, occupation's status, gender and rank of legion d'honneur of a person on zotero with zoteroperson's function.

//$person is a variable to save all informations of one person on zotero in JSON format. 

					
					
					$precision=isset($person->specification_verbatim) ? ($person->specification_verbatim) : 'unbekannt';
					$precision2=isset($person->profession->profession_verbatim) ? ($person->profession->profession_verbatim) : 'unbekannt';
					$military_status=$person->military_status->status;
					$social_status=$person->social_status->status;
					$occupation_status=$person->occupation_status->status;
					$gender=$person->gender;
					if($gender === 'M'){

							$gender='Männlich';

						} elseif ($gender === 'F'){
							
							$gender='Weiblich';
						} else {
							
							$gender='unbekannt';
						};
					$ldh=isset($person->ldh_rank['rank']) ? ($person->ldh_rank['rank']) : 'unbekannt';	


					
					$addr=$person->addresses;

					foreach($addr as $addresses){

						//print($addresses['street_id']);
						//print_r($addresses);
						//print('<br>');
						$addr1=$addresses['street']['name_old_clean'];
					}

					$addr_name=$addr1;

					foreach($addr as $addresses_new){

						$addr2=$addresses['street']['name_new'];
					}

					$addr_new=$addr2;

					foreach($addr as $nummer){

						$addr3=isset($nummer['houseno']) ? ($nummer['houseno']) : ' ' ;
					}

					$houseno=$addr3;
					//$bhvp = $person->original_references[0]['scan_no'];
					


				    


					

						

					


					

				