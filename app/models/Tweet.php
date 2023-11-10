<?php
class Tweet extends Model
{
    use TweetValidate;
    public string $table = "tweets";

    public function get($limit = 20)
    {
        $sql = "SELECT 
                    tweets.id,
                    tweets.user_id,
                    tweets.message,
                    tweets.created_at,
                    users.name AS user_name
                FROM tweets 
                INNER JOIN users ON tweets.user_id = users.id
                ORDER BY tweets.created_at DESC 
                LIMIT {$limit};";

        $values = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $this->values = $values;
        return $values;
    }

    public function incrementLikeCount($tweet_id)
    {
        $sql = "UPDATE tweets SET like_count = like_count + 1 WHERE id = :tweet_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['tweet_id' => $tweet_id]);
    }

    public function decrementLikeCount($tweet_id)
    {
        $sql = "UPDATE tweets SET like_count = like_count - 1 WHERE id = :tweet_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['tweet_id' => $tweet_id]);
    }

}
