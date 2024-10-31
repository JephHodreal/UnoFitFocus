import pandas as pd
from sklearn.preprocessing import StandardScaler
from sklearn.model_selection import train_test_split
from sklearn.ensemble import RandomForestClassifier

# Load csv file
df_squat = pd.read_csv('landmarks_squat.csv')

# Seperate dependent and independent variables
X = df_squat.iloc[:, 6:]
y = df_squat.iloc[:, 2:5]

# Split train and test data
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size = 0.2, random_state = 42)

# Feature scaling
X_train = StandardScaler().fit_transform(X_train)
X_test = StandardScaler().fit_transform(X_test)

# Instantiate the classification model
clf_squat = RandomForestClassifier()

# Fit the model with train data
clf_squat.fit(X_train, y_train)
