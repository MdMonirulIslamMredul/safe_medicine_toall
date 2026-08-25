<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportRequest extends FormRequest
{
    /**
     * Anyone (including guests) may submit a report.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Validation rules for the unsafe-medicine report form.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // Reporter info – optional (supports anonymous submissions)
            'reporter_name'    => 'nullable|string|max:255',
            'reporter_phone'   => 'nullable|string|max:20',

            // Core report fields
            'medicine_name'    => 'required|string|max:255',
            'batch_number'     => 'nullable|string|max:100',
            'pharmacy_name'    => 'required|string|max:255',
            'pharmacy_address' => 'required|string',
            'district'         => 'required|string|max:100',
            'description'      => 'required|string',

            // Up to 5 images, each ≤ 4 MB, jpeg/png/jpg only
            'images'           => 'nullable|array|max:5',
            'images.*'         => 'file|mimes:jpeg,png,jpg|max:4096',

            // Optional YouTube link
            'video'            => [
                'nullable',
                'url',
                'regex:/^(https?:\/\/)?(www\.)?(youtube\.com\/watch\?v=|youtu\.be\/)[\w\-]{11}/',
            ],
        ];
    }

    /**
     * Human-friendly error messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'medicine_name.required'    => 'Please enter the name of the medicine.',
            'pharmacy_name.required'    => 'Please enter the pharmacy name.',
            'pharmacy_address.required' => 'Please enter the pharmacy address.',
            'district.required'         => 'Please select or enter the district.',
            'description.required'      => 'Please describe the issue in detail.',
            'images.max'                => 'You may upload a maximum of 5 images.',
            'images.*.mimes'            => 'Each image must be a JPEG or PNG file.',
            'images.*.max'              => 'Each image must not exceed 4 MB in size.',
            'video.regex'               => 'Please provide a valid YouTube link (e.g. https://youtube.com/watch?v=...).',
        ];
    }
}
