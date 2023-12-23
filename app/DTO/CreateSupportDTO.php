<?

namespace App\DTO;

use App\Enums\SupportStatus;
use App\Http\Requests\StoreUpdateSupportRequest;
use App\Models\Support;

class CreateSupportDTO{
    public function __construct(
        public string $subject,
        public SupportStatus $status,
        public string $body){}

    public static function makeFromRequest(StoreUpdateSupportRequest $request){
        return new self(
            $request->subject,
            SupportStatus::A,
            $request->body
        );

    }

}
