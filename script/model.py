import pandas as pd
from sklearn.preprocessing import StandardScaler
from sklearn.model_selection import train_test_split
from sklearn.ensemble import RandomForestClassifier
import pickle

# Load csv file
df = pd.read_csv('script/landmarks.csv')

# Seperate dependent and independent variables
X = df.iloc[:, 2:]
y = df.iloc[:, 1]

# Split train and test data
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size = 0.2, random_state = 42)

# Feature scaling
X_train = StandardScaler().fit_transform(X_train)
X_test = StandardScaler().fit_transform(X_test)

# Instantiate the classification model
clf = RandomForestClassifier()

# Fit the model with train data
clf.fit(X_train, y_train)

# Pickle the model
pickle.dump(clf, open("script/model.pkl", 'wb'))