<div class="candidate-list-item">
    <div class="candidate-pic" style="background-image:url('{{asset("images/candidates/$candidate->id.jpg")}}'); background-size: 100px">
        <span class="no-badge">{{$candidate->no}}</span>
    </div>
    <div class="candidate-details">
        <div class="candidate-name">{{$candidate->name}} - {{$candidate->level}}</div>
        <div class="candidate-team"><strong>{{$candidate->team}}</strong></div>
        <div class="score-block">
            <span>
                <label for="{{$candidate->id}}-fanwear">Fan Wear</label>
                <input type="number" class="score"
                        id="{{$candidate->id}}-fanwear"
                        name="fanwear[{{$candidate->id}}]"
                        value="{{\App\Score::get($candidate->id, auth()->user()->id, 'fanwear')}}">
            </span>
            <span>
                <label for="{{$candidate->id}}-interview">Interview</label>
                <input type="number" class="score"
                        id="{{$candidate->id}}-interview"
                        name="interview[{{$candidate->id}}]"
                        value="{{\App\Score::get($candidate->id, auth()->user()->id, 'interview')}}">
            </span>
            <span>
                <label for="{{$candidate->id}}-formal">
                    @if($candidate->category=="Mr.") Formal Wear
                    @else Evening Gown
                    @endif
                </label>
                <input type="number" class="score"
                        id="{{$candidate->id}}-formal"
                        name="formal[{{$candidate->id}}]"
                        value="{{\App\Score::get($candidate->id, auth()->user()->id, 'formal')}}">
            </span>
        </div>
    </div>
</div>
