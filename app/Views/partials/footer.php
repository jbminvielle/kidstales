			</div> <!-- ajax content -->

		</div> <!-- app div -->

		<footer>
				<p>Réalisation : étudiants d’Hétic, P2015 | <strong onclick="openPopup('services/secure')">Dispositions concernant la sécurité des enfants</strong> | <a href="http://facebook.com/kidstales">Facebook</a> | <a href="http://twitter.com/kidstales">Twitter</a></p>
		</footer>

		<div id="map_cache" <?php if(!$cache) echo 'class="hidden"'; ?>></div>
		<div id="map_canvas" <?php if(!$map) echo 'class="hidden"'; ?>></div>

		<div id="popup_overlay"><section id="popup"><div></div></section></div>
	</body>
 
</html>