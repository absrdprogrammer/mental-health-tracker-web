<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mood_model extends CI_Model
{
    public function getBarChartData($user_id)
    {
        $this->db->select('date, mood, COUNT(*) as count');
        $this->db->from('mood_checkins');
        $this->db->where('user_id', $user_id);
        $this->db->group_by(['date', 'mood']);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getBarChartAllData()
    {
        // Query untuk mendapatkan jumlah mood per tanggal
        $this->db->select('date, 
                           SUM(CASE WHEN mood = "sad" THEN 1 ELSE 0 END) as sad_count,
                           SUM(CASE WHEN mood = "neutral" THEN 1 ELSE 0 END) as neutral_count,
                           SUM(CASE WHEN mood = "happy" THEN 1 ELSE 0 END) as happy_count');
        $this->db->group_by('date');
        $query = $this->db->get('mood_checkins'); // Gantilah dengan tabel mood yang sesuai

        return $query->result_array();
    }

    public function getPieChartData($user_id)
    {
        $this->db->select('mood, COUNT(*) as count');
        $this->db->from('mood_checkins');
        $this->db->where('user_id', $user_id);
        $this->db->group_by('mood');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPieChartAllData()
    {
        $this->db->select('mood, COUNT(*) as count');
        $this->db->from('mood_checkins');
        $this->db->group_by('mood');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function mood_checkin($data)
    {
        return $this->db->insert('mood_checkins', $data);
    }
    public function calculate_mental_health_score($user_id)
    {
        // Ambil data daily check-in pengguna
        $this->db->select('mood');
        $this->db->from('mood_checkins');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        $checkins = $query->result();

        // Inisialisasi variabel skor
        $total_score = 0;
        $total_entries = count($checkins);
        log_message('debug', 'Total entries: ' . $total_entries);

        if ($total_entries < 5) {
            return [
                'success' => false,
                'message' => 'Not enough data to calculate the score. At least 5 check-ins are required.',
            ];
        }

        // Kalkulasi skor berdasarkan mood
        foreach ($checkins as $checkin) {
            if ($checkin->mood === 'happy') {
                $total_score += 1; // Skor untuk mood positif
            } elseif ($checkin->mood === 'neutral') {
                $total_score += 0.5; // Skor untuk mood netral
            } // Negative mood memberi skor 0 (default)
        }

        log_message('debug', 'Total score: ' . $total_score);

        // Hitung skor rata-rata
        $average_score = $total_entries > 0 ? ($total_score / $total_entries) * 100 : 0;

        // Tentukan kategori dan interpretasi
        $category = '';
        $interpretation = '';

        if ($average_score >= 80) {
            $category = 'Resilient';
            $interpretation = 'Your mental health is strong and stable. Keep it up!';
        } elseif ($average_score >= 60) {
            $category = 'Balanced';
            $interpretation = 'You are in a stable condition, but there is room for improvement.';
        } elseif ($average_score >= 40) {
            $category = 'Vulnerable';
            $interpretation = 'You may be at risk of stress or emotional disturbance. Consider seeking support.';
        } else {
            $category = 'Unstable';
            $interpretation = 'Your mental health needs attention. Please consider reaching out for help.';
        }

        return [
            'success' => true,
            'score' => round($average_score),
            'category' => $category,
            'interpretation' => $interpretation
        ];
    }
}
