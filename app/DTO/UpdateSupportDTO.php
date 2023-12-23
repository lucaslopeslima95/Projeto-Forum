<?

namespace App\DTO;

use App\Enums\SupportStatus;
use App\Http\Requests\StoreUpdateSupportRequest;

class UpdateSupportDTO{
    public function __construct(
        public string $id,
        public string $subject,
        public SupportStatus $status,
        public string $body){}

    public static function makeFromRequest(StoreUpdateSupportRequest $request,string $id = null){
        return new self(
            $id ?? $request->id,
            $request->subject,
            SupportStatus::A,
            $request->body
        );

    }

}
