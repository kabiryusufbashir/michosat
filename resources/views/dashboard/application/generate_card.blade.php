<div id="generateCard" class="hidden">
    <div id="modal">
        <div id="modal-content" class="rounded">
            <div id="modal-header" class="modal-header">
                <span>Generate Card</span>
                <span id="closeModalgenerateCard" class="cursor-pointer">X</span>
            </div>
            <div class="p-4">
                <!-- Generate Card -->
                <form action="{{ route('root-generate-card') }}" method="POST" class="px-6 lg:px-8 py-8">
                    @csrf
                    <div>
                        <label for="card_no" class="text-lg font-medium">Card Number</label><br>
                        <input type="text" name="card_no" placeholder="Card Number" class="input-field">
                        @error('card_no')
                            {{$message}}
                        @enderror
                    </div>     
                    <div class="text-center my-4">
                        <button class="submit-btn">Generate Card</button>
                    </div>
                </form>
            </div>
        </div> 
    </div>
</div>

<script>
    // System Name 
    let generateCardLink = document.querySelector('#generateCardLink')
    let generateCard = document.querySelector('#generateCard')
    let closeModalgenerateCard = document.querySelector('#closeModalgenerateCard')

    generateCardLink.addEventListener('click', ()=>{
        if(generateCard.classList.contains('hidden')){
            generateCard.classList.remove('hidden');
        }else{
            generateCard.classList.add('hidden');
        }
    })

    closeModalgenerateCard.addEventListener('click', ()=>{
        if(generateCard.classList.contains('hidden')){
            generateCard.classList.remove('hidden');
        }else{
            generateCard.classList.add('hidden');
        }
    })
</script>