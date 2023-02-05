<script>checkServer()</script>
	<div class="modal fade" id="updateGuild">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title" id="updateName"></h4>
              <button type="button" style="border: none; background-color: transparent;" data-bs-dismiss="modal"><i class="fa fa-close" style="color: whitesmoke"></i></button>
            </div>

            <div class="modal-body">
				<input type="text" class="form-control" id="getName"></br>

				<div class="input-group mb-3">
					<input type="text" class="form-control" id="getDesc">
					<div class="input-group-append">
						<button class="btn btn-danger" onclick="clearDescription();" type="button">Sıfırla</button>
					</div>
				</div></br>

				<p class="text-muted">Aşağıda bulunan resim ve kapaklara sadece URL giriniz.</p>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">URL</span>
					</div>
						<input type="text" class="form-control" placeholder="Sunucu resimi değiştirmek için URL belirtin." id="getIcon">
						
				</div>
			</br>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">URL</span>
					</div>
						<input type="text" class="form-control" placeholder="Sunucu kapağı değiştirmek için URL belirtin." id="getBanner">
					
				
				</div>
			</br>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">URL</span>
					</div>
						<input type="text" placeholder="Keşif kapağı değiştirmek için URL belirtin." class="form-control" id="getDiscoverySplash" >
					
					
				</div>
			</br>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">URL</span>
					</div>
					<input type="text" class="form-control" placeholder="Davet kapağı değiştirmek için URL belirtin." id="getSplash">
					
			
				</div>
            </div>
            <div class="modal-footer">
				<button type="button" class="btn btn-danger light" data-dismiss="modal">Geri Dön</button>
				<button type="button" class="btn btn-warning" onclick="updateGuild();">Sunucuyu Güncelle</button>
            </div>
      
          </div>
        </div>
      </div>

	<div class="modal fade" id="infoGuild">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title" id="modal-title"></h4>
              <button type="button" style="border: none; background-color: transparent;" data-bs-dismiss="modal"><i class="fa fa-close" style="color: whitesmoke"></i></button>
            </div>

            <div class="modal-body" id="modal-body">
              
            </div>
      
            <div class="modal-footer">
              <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Geri Dön</button>
            </div>
      
          </div>
        </div>
      </div>

