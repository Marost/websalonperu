<script type="text/javascript">
var jhorBc = jQuery.noConflict();
jhorBc(document).ready(function(){
	jClockBc = function(jHoraBc, jMinBc, jSecBc) {
		jhorBc("#csbfh_hora_barca").html(jHoraBc + ':' + jMinBc + ':' + jSecBc);
	}
	var jHoraBc = '<?php echo date('H')+7 ?>';
	var jMinBc = '<?php echo date('i')?>';
	var jSecBc = '<?php echo date('s')?>';
	jClockBc(jHoraBc,jMinBc,jSecBc);
	var jClockBcInterval = setInterval(function(){
		jSecBc++;
		if (jSecBc >= 60) {
			jMinBc++;
			if (jMinBc >= 60) {
				jHoraBc++;
				if (jHoraBc > 23) {
					jHoraBc = '00';
				}
				else if (jHoraBc < 10) { jHoraBc = '0'+jHoraBc; }
				jMinBc = '00';
			}
			else if (jMinBc < 10) { jMinBc = '0'+jMinBc; }
			jSecBc = '00';
		}
		else if (jSecBc < 10) { jSecBc = '0'+jSecBc; }
		jClockBc(jHoraBc,jMinBc,jSecBc);
	}, 1000);
});

</script>
<p id="csbfh_hora_barca" style="float:left;"><?php echo date('G:i:s'); ?></p>