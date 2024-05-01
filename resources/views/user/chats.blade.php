<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <section style="background-color: #eee;">
                    <div class="container py-5">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-8 col-lg-6 col-xl-4">
                                <div class="card" id="chat1" style="border-radius: 15px;">
                                    <div class="card-header d-flex justify-content-between align-items-center p-3 bg-info text-white border-bottom-0" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                                        <i class="fas fa-angle-left"></i>
                                        <p class="mb-0 fw-bold">Message</p>
                                        <i class="fas fa-times"></i>
                                    </div>
                                    <div class="card-body" style="max-height: 500px; overflow-y: auto;" id="messageContainer">
                                        @foreach ($messages as $message)
                                        <div class=" d-flex flex-row justify-content-end">
                                            <div class="p-3 me-2 border" style="border-radius: 15px; background-color: #fbfbfb;">
                                                <p class="small mb-0">{{ $message->is_decrypted ? $message->message : "xxxxxx" }}</p>
                                            </div>
                                            <div class="align-items-center d-flex">
                                                <a href="javascript:void(0)" class="seen-message {{ $message->is_decrypted ? 'd-none' : ''}}" data-id="{{$message->id}}">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="small text-muted text-end mb-3 mr-4">{{$message->created_at->diffForHumans()}}</div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
