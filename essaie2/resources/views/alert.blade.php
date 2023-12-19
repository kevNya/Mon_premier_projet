                    @if(Session::has('success'))
                        <div  class="alert alert-success text-center  mx-auto mt-5 " role="alert">
                                {{(Session::get('success'))}}
                            </div>
                    @endif
                    @if(Session::has('warning'))
                        <div  class="alert alert-warning text-center  mx-auto mt-5 " role="alert">
                                {{(Session::get('warning'))}}
                            </div>
                    @endif
                    @if(Session::has('danger'))
                    <div  class="alert alert-danger text-center mx-auto mt-5 " role="alert">
                            {{(Session::get('danger'))}}
                        </div>
                    @endif
                    @if(Session::has('rendezvousData'))
                    <div  class="alert alert-danger text-center col-md-4 mx-auto mt-5 clignotant" role="alert">
                        {{(Session::get('rendezvousData'))}}
                    </div>
                    @endif
