<form method="post" id="user_form" enctype="multipart/form-data" class="row">
    <div class="row col-12  card">
         <div class="card-header bg-white">
         	<div class="card-title text-center text-muted">
         		Contact pour l'information
         	</div>
           
          </div>
        
        <div class="col-12 card-body">

        	<div class="form-group">
               <input type="text" name="name" id="name" class="form-control form-control-lg" placeholder="Entrez le nom">
            </div>

            <div class="form-group">
               <input type="text" name="subject" id="subject" class="form-control form-control-lg" placeholder="Entrez le sujet ">
            </div>

             <div class="form-group">
               
                <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Adresse email">
            </div>

            <div class="form-group">
                
                <div class="form-control-wrap">
                    <div class="form-editor-custom">
                        <textarea name="message" id="message"  class="form-control form-control-lg no-resize" placeholder="Tapper le message"></textarea>
                        <div class="form-editor-action text-center">
                            <a class="link collapsed" data-toggle="collapse" href="#filedown" aria-expanded="false"><em class="icon ni ni-clip"></em> Attacher</a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .col -->
        <div class="col-12">
            <div class="choose-file">
                <div class="form-group collapse" id="filedown" style="">
                    <div class="support-upload-box">
                        <div class="upload-zone dropzone dz-clickable">
                            <div class="dz-message" data-dz-message="">
                                <em class="icon ni ni-clip"></em>

                                <input type="file" name="user_image" id="user_image" class="form-control">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .col -->

        <div class="col-12" style="margin-bottom: 20px;">
        	<div class="row">
        		<div class="col-4"></div>
        		<div class="col-4">
        			<button type="submit" class="btn btn-info"> <i class="fa fa-send"></i> Envoyer</button>
        		</div>
        		<div class="col-4"></div>
        	</div>
        </div>
        
    </div><!-- .row -->
</form><!-- .form-contact -->
	