<script type="text/javascript">
var jhorLm = jQuery.noConflict();
jhorLm(document).ready(function(){
	jClockLm = function(jHoraLm, jMinLm, jSecLm) {
		jhorLm("#csbfh_hora_lima").html(jHoraLm + ':' + jMinLm + ':' + jSecLm);
	}
	var jHoraLm = '<?php echo date('H') ?>';
	var jMinLm = '<?php echo date('i')?>';
	var jSecLm = '<?php echo date('s')?>';
	jClockLm(jHoraLm,jMinLm,jSecLm);
	var jClockLmInterval = setInterval(function(){
		jSecLm++;
		if (jSecLm >= 60) {
			jMinLm++;
			if (jMinLm >= 60) {
				jHoraLm++;
				if (jHoraLm > 23) {
					jHoraLm = '00';
				}
				else if (jHoraLm < 10) { jHoraLm = '0'+jHoraLm; }
				jMinLm = '00';
			}
			else if (jMinLm < 10) { jMinLm = '0'+jMinLm; }
			jSecLm = '00';
		}
		else if (jSecLm < 10) { jSecLm = '0'+jSecLm; }
		jClockLm(jHoraLm,jMinLm,jSecLm);
	}, 1000);
});
</script>
<p id="csbfh_hora_lima" style="float:left;"><?php echo date('G:i:s'); ?></p>