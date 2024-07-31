@extends('LandingPage.Layout.Layout')
@section('KONTEN')
    <!-- Start Align Area -->
    <div class="whole-wrap">
        <div class="container box_1170">
            <div class="section-top-border">
                <div class="col-lg posts-list">
                    <div class="single-post">
                        <div class="row">
                            <div class="col-lg-8 col-md-8">
                                <h3 class="mb-30">Kritik dan Saran</h3>
                                <form action="/KritikSaranKirim" method="post">
                                    @csrf
                                    <div class="input-group-icon mt-10 border border-primary">
                                        <div class="icon"><i aria-hidden="true">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-file-earmark-person-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm2 5.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-.245S4 12 8 12s5 1.755 5 1.755z" />
                                                </svg></i></div>
                                        <input type="text" name="nama" placeholder="Nama Lengkap"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Lengkap'"
                                            required class="single-input">
                                    </div>
                                    <div class="input-group-icon mt-10 border border-primary">
                                        <div class="icon"><i aria-hidden="true">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-telephone-inbound-fill"
                                                    viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM15.854.146a.5.5 0 0 1 0 .708L11.707 5H14.5a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 1 0v2.793L15.146.146a.5.5 0 0 1 .708 0z" />
                                                </svg></i></div>
                                        <input type="number" name="notelepon" placeholder="No Telpon/No Handphone"
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'No Telpon/No Handphone'" required
                                            class="single-input">
                                    </div>
                                    <div class="input-group-icon mt-10 border border-primary">
                                        <div class="icon"><i aria-hidden="true">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-house-add" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h4a.5.5 0 1 0 0-1h-4a.5.5 0 0 1-.5-.5V7.207l5-5 6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                                                    <path
                                                        d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 1 0 1 0v-1h1a.5.5 0 1 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z" />
                                                </svg></i></div>
                                        <input type="text" name="alamat" placeholder="Alamat"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Alamat'" required
                                            class="single-input">
                                    </div>
                                    <div>
                                        <label for="">Apakah Ada indikasi kecurangan dari pelayanan yang kami berikan ?</label>
                                    </div>
                                    <div class="mt-10 border border-primary">
                                        
                                        <div class="form-select" id="default-select" >
                                            <select name="kecurangan">
                                                <option value="tidak">Tidak</option>
                                                <option value="Ya">Iya</option>                                              
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mt-10">
                                        <textarea class="single-textarea border border-primary" name="kritiksaran" placeholder="Kritik Dan Saran"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Kritik Dan Saran'" required></textarea>
                                    </div>

                                   
                                    <div>
                                        <label for="">Bagaimana Pendapat Anda Tentang Pelayanan Kami ?</label>
                                    </div>
                                    <div class="mt-10 border border-primary">
                                        
                                        <div class="form-select" id="default-select" >
                                            <select name="nilai">
                                                <option disabled selected>Pilih Nilai</option>
                                                @foreach ($nilai as $p )
                                                <option value="{{ $p->id }}">{{ $p->deskripsi }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="input-group-icon mt-10">
                                        <div class="button-group-area d-flex justify-content-end">
                                            <button type="reset" class="genric-btn primary">Reset</button>
                                            <button type="submit" class="genric-btn success">Kirim</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Align Area -->
@endsection
