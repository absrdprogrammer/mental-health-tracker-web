<?php
class Sentiment_analysis
{

    // Simulasi fungsi analisis sentimen
    public function analyze($text)
    {
        // Koneksi ke model machine learning
        // Anda dapat mengganti bagian ini dengan integrasi API model ML
        $sentiments = ['positive', 'neutral', 'negative'];

        // Simulasi analisis sentimen (gunakan model sebenarnya)
        $score = rand(0, 2); // Random hanya untuk simulasi
        return $sentiments[$score];
    }
}
