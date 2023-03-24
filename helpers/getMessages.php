<?php
function getUnreadMessagesCount($currentUserId, $fromUserId, $conn) {
    $sql = "SELECT COUNT(*) as unread_count FROM chats WHERE to_id = :currentUserId AND from_id = :fromUserId AND opened = 0";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':currentUserId', $currentUserId, PDO::PARAM_INT);
    $stmt->bindParam(':fromUserId', $fromUserId, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['unread_count'];
}

?>
