<div id="main-content" class="wrapper">
		<div class="container">
			<div class="contact-info">
				
				<div class="contact-info-right">
					<h2 class="contact-title"> 	<i class="fa fa-user" style="background: #2AACC8;color:#fff;padding:10px;border-radius:20px"></i>  Hubungi Kami </h2>
					<p> Setiap anda mengisi form ini akan dibalas oleh email, <b>tirtameganusantara@tmn.co.id</b>
					</p>
					<form class="form-contact" id="form-contact-us" action="javascript:send_message();">
						<fieldset>
							<ol>
								<li>
									<label for="name">Name</label>
									<input type="text" name="contactus_name" value="" size="" placeholder=" Name">
								</li>
								<li>
									<label for="name">Email Address</label>
									<input type="text" name="contactus_email" value="" size="" placeholder=" Email">
								</li>
								<li>
									<label for="name">Subject</label>
									<select name="contactus_subject">
										<option value="">Choose Subject</option>
										<option value="Permintaan Rapat"> Permintaan Rapat  </option>
										<option value="Permintaan Profil Perusahaan "> Permintaan Profil Perusahaan </option>
										<option value="Undangan Tender"> Undangan Tender </option>
										<option value="other"> Lainnya </option>
									</select>
								</li>
								<li style="display:none" class="other">
									<input  type="text" name="contactus_subject_other" value="" placeholder="Other Subject" size="">
								</li>
								<li>
									<label for="name">Message</label>
									<textarea name="contactus_description" id="contactus_description" rows="10" cols="63"></textarea>
								</li>
								<li>
									<br>
									<?php
										echo $captcha_img;
									?>
									<br>
									<br>
									<input type="text" name="captcha" placeholder="Security Code">
									<input type="hidden" name="captcha_word" value="<?php echo $word ?>">
								</li>
								<li>
									<input type="submit"  name="save" value="Send">
									<input type="reset" name="save" value="Reset">
								</li>
							</ol>
						</fieldset>
					</form>
				</div>

				<div class="contact-info-left">
					<div class="location-map">
								<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15866.951602163106!2d106.9434523!3d-6.1658436!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7c50964f6e83e572!2sGreen+Sedayu+Biz+Park+Cakung!5e0!3m2!1sen!2sid!4v1511295492111" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>

				    <div class="address-info">
						<h3>Head Office & Workshop :</h3>
						<p>Green Sedayu Biz Park Cakung blok GS 17/25</p>
						<p>Jl. Cakung Cilincing Tiur Raya KM 2, Jakarta Timur</p>
					</div>
					
					<div class="address-info">
						<h3>Operational Office :</h3>
						<p>Jl. Sunter II No 6A Komplek Deperta Jakarta Utara 14320</p>
					</div>
					
					<div class="address-info">
						<h3>PIC :</h3>
						<p> Ryan T Yacob  </p>
						<p> Amdi Ariefianto  </p>
						<p> David Junika </p>
						<p> Ade Zulhijah </p>
						<p> Phone : 021 29452321 </p>
						<p> Fax : 021 29452321 </p>
					</div>
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript">
	
	var captcha  = "";

	$(document).ready(function(){
	    $('[name="contactus_subject"]').val("");
		$('[name="contactus_subject"]').change(function()
		{
			contactus_subject = $('[name="contactus_subject"]').val();
			if(contactus_subject == 'other')
			{
				$('[name="contactus_subject_other"]').val('');
				$(".other").show();
			    
			}
			else
			{
			    $('[name="contactus_subject_other"]').val('');
				$(".other").hide();
			    
			}
		})
	})
	
	function send_message()
	{
		var captcha = $('[name="captcha"]').val();
		
		
			$.ajax({
				url:"<?php base_url()  ?>TankCleanEn/send_message",
				data:$("#form-contact-us").serialize(),
				method:"POST",
				
				success:function(turn_data){
					if(turn_data.data==1)
					{
						
		                swal("Thank you for attention, wait for our feedback","","success");
		                $("#form-contact-us")[0].reset();
					}
					else
					{
						swal({
		                  title: "Error",
		                  type: "error",
		                  text: turn_data,
		                  html: true
		                });
					}
				}
			})
			
		
	}

</script>
	